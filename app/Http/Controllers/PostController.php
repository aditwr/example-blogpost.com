<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $title = 'All Post';
        $posts = Post::latest()->with(['category', 'user']);


        $request->whenHas('search', function ($keyword) use ($posts) {
            return $posts->local_search($keyword);
        });
        ($request->filled('search')) ? $title = "Search : " . $request->search : '';

        $request->whenHas('category', function ($slug) use ($posts) {
            return $posts->local_category($slug);
        });
        ($request->filled('category')) ? $title = "Category : " . $request->category : '';

        $data = [
            'title' => $title,
            'active' => 'blog',
            'posts' => $posts->paginate(8)->withQueryString(),
            'categories' => Category::latest()->get()
        ];
        return view('post.index', $data);
    }

    public function showSinglePost(Post $post)
    {
        $data = [
            'title' => $post->title,
            'active' => 'blog',
            'post' => $post
        ];
        return view('post.single', $data);
    }

    // error bacause it posts return collection,
    // but pagination needs an model instance
    public function postByCategory(Category $category)
    {
        $data = [
            'title' => $category->name . " Post",
            'active' => 'blog',
            'posts' => $category->posts->load('user', 'category'),
            'categories' => Category::latest()->get()
        ];

        return view('post.index', $data);
    }
}

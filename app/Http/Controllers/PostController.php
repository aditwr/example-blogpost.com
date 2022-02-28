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
}

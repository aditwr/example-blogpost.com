<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $title = 'All Post';
        $posts = Post::latest()->with(['category', 'user']); // eloquent method return query builder instance, it allow you to chain constraint


        $request->whenHas('search', function ($keyword) use ($posts) {
            return $posts->local_search($keyword);
        });
        ($request->filled('search')) ? $title = "Search : " . $request->search : '';

        $request->whenHas('category', function ($slug) use ($posts) {
            return $posts->local_category($slug);
        });
        ($request->filled('category')) ? $title = "Category : " . $request->category : '';

        $request->whenHas('author', function ($author_username_value) use ($posts) {
            return $posts->local_author($author_username_value);
        });
        ($request->filled('author')) ? $title = 'Author : ' . $request->author : '';

        $data = [
            'title' => $title,
            'active' => 'blog',
            'posts' => $posts->paginate(8)->withQueryString(), // paginate() will return paginator / lengtawarepagonator instance
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

    // collection : load() all()
    // builder / query builder : get() with() paginate() links()

    // can't use paginate because paginate is method in query builder instance, 
    // this $category->posts definitely return collection as a result so it can be converted to builder instance

    public function postByCategory($category_slug)
    {
        $categories = Category::latest()->get();
        // for title search
        $category = Category::where('slug', $category_slug)->get(); // return collection that contains single instance, not single instance directly
        $posts = Post::getPostByCategory($category_slug); // return query builder for post model

        $data = [
            'title' => $category[0]->name . ' Post',
            'active' => 'blog',
            'hidden_carousel_and_headpost' => true,
            'posts' => $posts->paginate(3)->withQueryString(),
            'categories' => $categories,
        ];

        return view('post.index', $data);
    }

    public function postByAuthor($author_username)
    {
        // for title search 
        $user = User::where('username', $author_username)->get(); // where() return collection, even if the result if single instance
        $categories = Category::latest()->get();
        $posts = Post::getPostByAuthor($author_username); // return query builder for post model
        $data = [
            'title' => 'Post published by ' . $user[0]->username,
            'active' => 'blog',
            'hidden_carousel_and_headpost' => true,
            'posts' => $posts->paginate(3)->withQueryString(),
            'categories' => $categories,
        ];

        return view('post.index', $data);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'All Post',
            'active' => 'blog',
            'posts' => Post::with(['category', 'user'])->paginate(8),
            'categories' => Category::all()
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

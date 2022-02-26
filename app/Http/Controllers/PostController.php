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
            'posts' => Post::with(['category', 'user'])->get(),
            'categories' => Category::all()
        ];
        return view('post.index', $data);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    // this method is only used to generate and radirect url /blog/search/{search_keyword}
    public function redirect(Request $request)
    {
        $keyword = $request->input('search');
        return redirect(url('/blog/search/' . $keyword));
    }

    public function show($keyword)
    {
        $posts = Post::searchByKeyword($keyword);
        $categories = Category::latest()->get();

        $data = [
            'title' => 'Search : ' . $keyword,
            'active' => 'blog',
            'hidden_carousel_and_headpost' => true,
            'posts' => $posts->paginate(3)->withQueryString(),
            'categories' => $categories,
        ];

        return view('post.index', $data);
    }
}

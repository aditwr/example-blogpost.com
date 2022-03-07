<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get : /dashboard/posts
        $data = [
            'title' => 'Dashboard | My Posts',
            'posts' => Post::where('user_id', auth()->user()->id)->latest()->paginate(3)->withQueryString(),
        ];
        return view('dashboard.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //  get: dashboard/posts/create
        $data = [
            'title' => 'Create New Post',
            'categories' => Category::all()
        ];
        return view('dashboard.posts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // post: dashboard/posts
        $validated = $request->validate([
            'title' => ['required', 'max:255'],
            'category_id' => ['required'],
            'body' => ['required'],
        ]);

        $validated['slug'] = Str::slug($request->title) . '-by-' . Str::slug(auth()->user()->username);
        $validated['excerpt'] = Str::remove('&nbsp;', Str::limit(strip_tags($validated['body']), 100, '...'));
        $validated['user_id'] = auth()->user()->id;


        if (Post::create($validated)) {
            return redirect('/dashboard/posts')->with('success', 'New post has been added!');
        }

        return back()->with('failed', 'system can\'t add new post');
    }

    /**
     * Display the specified resource. / single post
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // get : /dashboard/posts/{post:id}
        $data = [
            'title' => $post->title,
            'post' => $post,
        ];
        return view('dashboard.posts.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // get: dashboard/posts/{post:slug}/edit
        $data = [
            'title' => 'Edit Post',
            'post' => $post,
            'categories' => Category::all()
        ];

        return view('dashboard.posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // put: dashboard/posts/{{ post:slug }} 
        // processing the query from edit form

        // generate a new slug
        $newSlug = Str::slug($request->title) . '-by-' . Str::slug(auth()->user()->username);

        $rules = [
            'title' => ['required', 'max:255'],
            'category_id' => ['required'],
            'body' => ['required'],
        ];
        // if slug is exists in db, pass the validate for slug
        if ($newSlug != $post->slug) {
            $rules['slug'] = ['required', 'unique:posts,slug'];
        }

        $validated = $request->validate($rules);

        Post::where('id', $post->id)->update($validated);

        return redirect('/dashboard/posts')->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // delete: dashboard/posts/{post:slug}
        Post::destroy($post->id);

        return redirect('/dashboard/posts')->with('success', 'Post has been deleted!');
    }
}

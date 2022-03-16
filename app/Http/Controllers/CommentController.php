<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $validated_data_input = $request->validate([
            'body' => 'required|string|max:500'
        ]);

        // if user is't authenticated, redirect back with error flash message
        if (!auth()->user()) {
            return back()->with('deny', 'You must login first to get access to write comments.');
        }

        // user_id, post_id, body
        $user_id = auth()->user()->id;
        $post_id = $post->id;

        $validated_data_input['user_id'] = $user_id;
        $validated_data_input['post_id'] = $post_id;

        // mass asignment
        Comment::create($validated_data_input);
        return back()->with('success', 'Comment has been published!');
    }

    public function destroy(Comment $comment)
    {
        if (Comment::destroy($comment->id)) {
            return back()->with('success', 'Comment deleted successfully!');
        }

        return back()->with('fail', 'Can\'t deleting the comment because System\'s error!, try to contact the developer');
    }
}

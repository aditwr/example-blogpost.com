<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'user_id',
        'post_id'
    ];

    //eager load post model because comment model is child model in this relationship, so
    protected $with = ['post', 'user'];

    // because comment model is child model in this relationship, so 
    // laravel assume that comment has an post_id as a foreign key

    // Load the post model and return it's relationship to the comment model
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeLocal_PostComments($query_builder_for_comment_model, $post_id)
    {
        return $query_builder_for_comment_model->whereHas('post', function ($query_builder_for_post_model) use ($post_id) {
            $query_builder_for_post_model->where('id', $post_id);
        });
    }
}

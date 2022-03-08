<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    // fillable
    // guard
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    /**
     * Get the route key for the model.
     *
     * @return string
     */

    public function getRouteKeyName()
    {
        return 'slug';
    }



    // query scope local
    // the purpose of query scope is to chain constraint
    public function scopeLocal_Search($query_builder_for_post_model, $search_keyword)
    {
        return $query_builder_for_post_model->where('title', 'like', '%' . $search_keyword . '%') // query builder's model refer to Post model
            ->orWhere('body', 'like', '%' . $search_keyword . '%');
    }

    // whereHas() from query builder can't retrieve more than one parameter, it's only accept one parameter
    // this parameter will contains query builder based on the relationship being declared
    public function scopeLocal_Category($query_builder_for_post_model, $category_slug)
    {
        return $query_builder_for_post_model->whereHas('category', function ($query_builder_for_category_model) use ($category_slug) { // closure for constraint / instance post yang diambil harus memenuhi syarat / constarint yang ada di dalam closure ini
            $query_builder_for_category_model->where('slug', $category_slug); // from here, query builder's model 
        });
    }

    public function scopeLocal_Author($query_builder_for_post_model, $author_username_value) // this query builder's model refer to Post model
    {
        return $query_builder_for_post_model->whereHas('user', function ($query_builder_for_user_model) use ($author_username_value) {
            $query_builder_for_user_model->where('username', $author_username_value);
        });
    }




    public function scopeSearchByKeyword($query_builder_for_post_model, $keyword)
    {
        return $query_builder_for_post_model->where('title', 'like', '%' . $keyword . '%')->orWhere('body', 'like', '%' . $keyword . '%');
    }


    public function scopeGetPostByCategory($query_builder_for_post_model, $category_slug)
    {
        return $query_builder_for_post_model->whereHas('category', function ($query_builder_for_category_model) use ($category_slug) {
            $query_builder_for_category_model->where('slug', $category_slug);
        });
    }

    public function scopeGetPostByAuthor($query_builder_for_post_model, $author_username)
    {
        return $query_builder_for_post_model->whereHas('user', function ($query_builder_for_user_model) use ($author_username) {
            $query_builder_for_user_model->where('username', $author_username);
        });
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // fillable
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'user_id',
        'category_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // query scope local
    public function scopeLocal_Search($query, $keyword)
    {
        return $query->where('title', 'like', '%' . $keyword . '%')
            ->orWhere('body', 'like', '%' . $keyword . '%');
    }

    public function scopeLocal_Category($query, $slug)
    {
        return $query->whereHas('category', function ($query) use ($slug) { // closure for constraint / instance post yang diambil harus memenuhi syarat / constarint yang ada di dalam closure ini
            $query->where('slug', $slug);
        });
    }
}

<?php

namespace App\Entities\Blog;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'title', 'slug', 'content', 'image',
        'is_publish', 'view_count', 'author_id',
        'category_id', 'editor_id', 'published_at'
    ];

    protected $dates = [
        'published_at'
    ];

    protected $casts = [
        'is_publish'    =>  'Boolean'
    ];

    public function author () {
        return belongsTo(\App\User::class, 'author_id');
    }

    public function editor ( ) {
        return belongsTo(\App\User::class, 'editor_id');
    }


    public function category () {
        return belongsTo(Category::class);
    }
}

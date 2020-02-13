<?php

namespace App\Entities\Blog;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'title', 'slug', 'content', 'image',
        'is_publish', 'view_count', 'author_id',
        'category_id', 'editor_id', 'published_at', 'description'
    ];

    protected $dates = [
        'published_at'
    ];

    protected $casts = [
        'is_publish'    =>  'Boolean'
    ];

    protected $appends = [
        'hashid'
    ];

    public function getHashidAttribute () {
        return hashid_encode($this->id);
    }

    public function author () {
        return $this->belongsTo(\App\User::class, 'author_id');
    }

    public function editor ( ) {
        return $this->belongsTo(\App\User::class, 'editor_id');
    }


    public function category () {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}

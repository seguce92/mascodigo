<?php

namespace App\Entities\Blog;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'title', 'slug'
    ];

    public function posts () {
        return $this->hasMany(Post::class);
    }
}

<?php

namespace App\Entities\Learn;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'title', 'url', 'repository', 'is_publish', 'is_private', 'duration', 'points', 'order', 'course_id', 'author_id', 'editor_id', 'published_at'
    ];

    protected $casts = [
        'is_publish'    =>  'boolean',
        'is_private'    =>  'boolean',
        'publish_at'    =>  'datetime'
    ];

    public function author () {
        return $this->belongsTo(\App\User::class, 'author_id', 'id');
    }

    public function editor () {
        return $this->belongsTo(\App\User::class, 'editor_id', 'id');
    }


    public function course () {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function comments () {
        return $this->hasMany(Comment::class, 'lesson_id', 'id')->whereNull('parent_id');
    }
}

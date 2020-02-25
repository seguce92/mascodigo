<?php

namespace App\Entities\Learn;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Str;

class Lesson extends Model
{
    protected $fillable = [
        'title', 'url', 'content', 'repository', 
        'is_publish', 'is_private', 'is_premium', 
        'duration', 'points', 'order', 'course_id', 
        'author_id', 'editor_id', 'published_at', 'views'
    ];

    protected $dates = [
        'published_at'
    ];

    protected $casts = [
        'is_publish'    =>  'boolean',
        'is_private'    =>  'boolean',
        'is_premium'    =>  'boolean',
    ];

    protected $appends = [
        'server', 'published_human', 'created_human', 'hashid'
    ];

    public function getHashidAttribute () {
        return hashid_encode($this->id);
    }

    public function getPublishedHumanAttribute () {
        return $this->published_at ? date_text($this->published_at) : '';
    }

    public function getCreatedHumanAttribute () {
        return date_text($this->created_at);
    }

    public function getServerAttribute () {
        if ( Str::contains($this->url, 'youtube') )
            return 'youtube';
        else if ( Str::contains($this->url, 'vimeo') )
            return 'vimeo';
        else
            return 'local';
    }

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

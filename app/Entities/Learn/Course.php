<?php

namespace App\Entities\Learn;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title', 'slug', 'icon', 'color', 'content', 'is_publish', 'level', 'skill_id', 'author_id', 'editor_id', 'published_at'
    ];

    protected $dates = [
        'published_at'
    ];

    protected $casts = [
        'is_publish'    =>  'boolean'
    ];

    protected $appends = [
        'published_human', 'created_human', 'hashid'
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

    public function author () {
        return $this->belongsTo(\App\User::class, 'author_id', 'id');
    }

    public function editor () {
        return $this->belongsTo(\App\User::class, 'editor_id', 'id');
    }

    public function skill () {
        return $this->belongsTo(Skill::class, 'skill_id', 'id');
    }

    public function lessons () {
        return $this->hasMany(Lesson::class, 'course_id', 'id');
    }
}

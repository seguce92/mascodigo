<?php

namespace App\Entities\Learn;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title', 'slug', 'content', 'is_publish', 'level', 'skill_id', 'author_id', 'editor_id', 'published_at'
    ];

    protected $casts = [
        'published_at'  =>  'datetime',
        'is_publish'    =>  'boolean'
    ];

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

<?php

namespace App\Entities\Learn;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment', 'lesson_id', 'parent_id', 'user_id'
    ];

    public function user () {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }

    public function lesson () {
        return $this->belongsTo(Lesson::class, 'lesson_id', 'id');
    }

    public function parent () {
        $this->belongsTo(Comment::class, 'parent_id', 'id');
    }

    public function replies () {
        return $this->hasMany(Comment::class, 'parent_id', 'id');
    }
}

<?php

namespace App\Entities\Learn;

use Illuminate\Database\Eloquent\Model;

class Advance extends Model
{
    protected $table = 'advances';

    protected $fillable = [
        'course_id', 'lesson_id', 'user_id'
    ];

    protected $appends = [
        'created_human'
    ];

    public function getCreatedHumanAttribute () {
        return date_text($this->created_at);
    }

    public function user () {
        return $this->belongsTo(\App\User::class);
    }

    public function course () {
        return $this->belongsTo(Course::class);
    }

    public function lesson () {
        return $this->belongsTo(Lesson::class);
    }
}

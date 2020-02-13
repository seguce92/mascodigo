<?php

namespace App\Entities\Learn;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'histories';

    protected $fillable = [
        'lesson_id', 'user_id'
    ];
    
    protected $appends = [
        'created_human', 'hashid'
    ];

    public function getHashidAttribute () {
        return hashid_encode($this->id);
    }

    public function getCreatedHumanAttribute () {
        return date_text($this->created_at);
    }

    public function user () {
        return $this->belongsTo(\App\User::class);
    }

    public function lesson () {
        return $this->belongsTo(Lesson::class);
    }
}

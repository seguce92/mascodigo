<?php

namespace App\Entities\Learn;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'favorites';

    protected $fillable = [
        'lesson_id', 'user_id'
    ];

    protected $appends = [
        'hashid', 'created_human'
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

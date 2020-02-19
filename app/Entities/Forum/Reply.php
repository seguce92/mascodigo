<?php

namespace App\Entities\Forum;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = [
        'content', 'mention_id', 'solved', 'question_id', 'user_id'
    ];

    protected $appends = [
        'created_human', 'mentions'
    ];

    protected $casts = [
        'solved'    =>  'Boolean'
    ];

    public function getCreatedHumanAttribute () {
        return $this->created_at->diffForHumans();
    }

    public function getMentionsAttribute () {
        return $this->mention_id ? url('/me/'.$this->mention->username) : null;
    }

    public function user () {
        return $this->belongsTo(\App\User::class);
    }

    public function question () {
        return $this->belongsTo(Question::class);
    }

    public function mention () {
        return $this->belongsTo(\App\User::class, 'mention_id', 'id');
    }
}

<?php

namespace App\Entities\Learn;

use Illuminate\Database\Eloquent\Model;

class Complete extends Model
{
    protected $table = 'completes';

    protected $fillable = [
        'percent', 'xp', 'course_id', 'user_id'
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
}

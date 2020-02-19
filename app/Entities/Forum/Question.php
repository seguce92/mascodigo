<?php

namespace App\Entities\Forum;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'title', 'slug', 'content', 'views', 'solved', 'channel_id', 'user_id'
    ];

    protected $appends = [
        'created_human', 'channel_slug', 'replies_total'
    ];

    public function getCreatedHumanAttribute () {
        return $this->created_at->diffForHumans();
    }

    public function getChannelSlugAttribute () {
        return $this->channel ? $this->channel->slug : 'general';
    }

    public function getRepliesTotalAttribute () {
        return $this->replies->count();
    }

    public function user () {
        return $this->belongsTo(\App\User::class);
    }

    public function channel () {
        return $this->belongsTo(Channel::class);
    }

    public function replies () {
        return $this->hasMany(Reply::class);
    }
}

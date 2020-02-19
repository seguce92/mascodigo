<?php

namespace App\Entities\Forum;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $table = 'channels';

    protected $fillable = [
        'title', 'slug', 'icon', 'color'
    ];

    public function questions () {
        return $this->hasMany(Question::class);
    }
}

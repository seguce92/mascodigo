<?php

namespace App\Entities\Learn;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skills';

    protected $fillable = [
        'name', 'slug', 'description', 'icon'
    ];

    protected $appends = [
        'hashid'
    ];

    public function getHashidAttribute () {
        return hashid_encode($this->id);
    }

    public function courses () {
        return $this->hasMany(Course::class, 'skill_id', 'id');
    }
}

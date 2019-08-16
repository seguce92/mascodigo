<?php

namespace App\Entities\Learn;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'name', 'slug', 'description', 'icon'
    ];

    public function courses () {
        return $this->hasMany(Course::class, 'skill_id', 'id');
    }
}

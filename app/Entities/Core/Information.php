<?php

namespace App\Entities\Core;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $table = 'information';

    protected $fillable = [
        'facebook', 'twitter', 'youtube', 'linkedin', 'medium', 'pinterest', 'github', 
        'codepen', 'jsfiddle', 'gitlab', 'reddit', 'telegram', 'whatsapp', 'content', 'portlet', 'user_id'
    ];

    public function user () {
        return $this->belongsTo(\App\User::class);
    }
}

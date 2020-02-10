<?php

namespace App;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Storage;

class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;

    protected $guard_name = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'fullname', 'email', 'password', 'photo', 'xp', 'profile', 'status',
        'provider', 'email_verified_at', 'verification_token', 'plan', 'end_suscription_at', 'is_premium'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at'     =>  'datetime',
        'end_suscription_at'    =>  'datetime',
        'is_premium'            =>  'boolean'
    ];

    public function getPhotoAttribute ($value) {
        /*return Storage::disk('upload_files')->exists('users/'.$this->username) 
            ? asset('storage/users/'.$this->username) : asset('img/default.png');*/
        
        return strlen($value) && \strlen($value) > 5 ? $value : asset('img/default.png');
    }

    public function information () {
        return $this->hasOne(\App\Entities\Core\Information::class);
    }

    public function courses () {
        return $this->hasMany(\App\Entities\Learn\Course::class);
    }

    public function posts () {
        return $this->hasMany(\App\Entities\Blog\Post::class, 'author_id');
    }
}

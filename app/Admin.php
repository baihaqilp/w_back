<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticable
{
    //
    use Notifiable;

    protected $guard = 'admin';

    protected $fillable = [
        'name', 'email', 'username', 'password'
    ];

    protected $hidden = ['password','remember_token'];

    public function getFotoAttribute()
    {
        if (! $this->attributes['foto']) {
            return '/img/default_image.png';
        }

        return $this->attributes['foto'];
    }
}

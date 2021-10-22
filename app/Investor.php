<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Investor extends Authenticable
{
    //
    use Notifiable;

    protected $guard = 'investor';

    protected $fillable = [
        'name', 'email', 'username', 'password','foto'
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

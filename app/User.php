<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'fb_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function movies()
    {
        return $this->hasMany(Movie::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function actors()
    {
        return $this->hasMany(Actor::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}

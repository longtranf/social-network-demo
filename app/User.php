<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'email', 'password', 'wall_id', 'profile_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function post ()
    {
        return $this->hasMany('App\Post');
    }

    public function comment ()
    {
        return $this->hasMany('App\Comment');
    }

    public function friends ()
    {
        // return $this->belongsToMany('App\User', 'userfriend', 'id', );
    }

    public function groups ()
    {
        return $this->belongsToMany('App\Group', 'usergroup');
    }
}

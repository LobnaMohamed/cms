<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * @param $is
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function post($is)
    {
        return $this->hasOne('App\Post');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role')->withPivot('created_at');

        // To customize table name and columns, follow the format below.
        //return $this->belongsToMany('App\Role', 'users_roles', 'user_id', 'role_id');
    }

    public function photos()
    {
        return $this->morphMany('App\Photo', 'imageable');
    }
}

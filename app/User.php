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

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'user_role');
    }

    public function grades()
    {
        return $this->belongsToMany('App\Grade', 'user_grade');
    }

    public function lessons()
    {
        return $this->hasMany('App\Lesson');
    }

    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    public function files()
    {
        return $this->hasMany('App\File');
    }

    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }

        return false;
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('role', $role)->first()) {
            return true;
        }

        return false;
    }
}

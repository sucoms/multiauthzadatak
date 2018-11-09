<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'surname', 'email', 'phone', 'password','role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    //hash password
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * The attributes that are hidden.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function IsAdmin()
    {
        if ($this->role) {
            return true;
        }
        return false;
    }
    
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
}

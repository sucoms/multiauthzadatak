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
        'name', 'surname', 'email', 'phone', 'password','admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    //hash password
    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function is_admin(){
        if($this->admin){
            return true;
        }
        return false;
    }
}

<?php

namespace App\Models;

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
        return $this->belongsToMany(Role::class,'user_roles','user_id','role_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class,'reg_customer','id');
    }


    public function isAdmin()
    {
        return !! ($this->roles->first()->name == 'Admin');
//        or
//
//        return($this->user_role == 1) ? true :false;

//        or

//        if($this->user_role ==1)
//            return true;
//        else
//            return false;
    }

    public function isCustomer()
    {
        return !! ($this->roles->first()->name == 'Customer');
    }

}

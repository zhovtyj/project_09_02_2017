<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function userInfo()
    {
        return $this->hasOne('App\UserInfo');
    }

    public function cart()
    {
        return $this->hasMany('App\Cart');
    }

    /**
     * $roles - array which we receive from middleware
     * Check if the user has a role from roles array - so we will know if user has access to the page
     */
    public function hasAnyRole($roles)
    {
        if(is_array($roles)){
            foreach ($roles as $role){
                if ($this->hasRole($role)){
                    return true;
                }
            }
        } else{
            if ($this->hasRole($roles)){
                return true;
            }
        }
        return false;
    }

    /**
     * Check if the user has a role
     */
    public function hasRole($role)
    {
        if ($this->role()->where('name', $role)->first()){
            return true;
        }
        return false;
    }

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
}

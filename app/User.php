<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
	use Notifiable;

	protected $fillable = [
		'user', 'password', 'people_id',
	];


	protected $hidden = [
		'password', 'remember_token',
	];

	public function people()
	{
		return $this->belongsTo('App\People');
	}

	public function roles()
    {
        return $this->belongsToMany('App\Role')->withTimestamps();
    }

    public function role_user()
    {
        return $this->hasMany('App\role_user');
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
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

    public function authorizeRoles($roles)
    {
        if ($this->hasAnyRole($roles)) {
            return true;
        }
        abort(401, 'Este usuario no tiene permisos para entrar aquí.');
    }


}
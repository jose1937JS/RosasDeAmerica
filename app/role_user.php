<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role_user extends Model
{
	protected $fillable = ['role_id', 'user_id'];

	public function roles()
	{
		return $this->hasMany('App\Role');
	}

	public function users()
	{
		return $this->hasMany('App\User');
	}
}

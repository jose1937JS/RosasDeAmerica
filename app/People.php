<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
	protected $table = 'people';
    protected $fillable = ['pin', 'first_name', 'last_name', 'email', 'phone', 'address'];

    public function sale()
    {
    	return $this->hasOne('App\Sale');
    }

    public function user()
    {
    	return $this->hasOne('App\User');
    }
}

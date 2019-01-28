<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['name', 'address', 'phone', 'email', 'rif'];

    public function shopping()
    {
    	return $this->hasOne('App\Shopping');
    }
}

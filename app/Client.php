<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['cedula', 'first_name', 'last_name', 'phone', 'address'];

    public function products()
    {
    	return $this->hasMany(Product::class);
    }

    public function venta()
    {
    	return $this->hasOne(Venta::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
	protected $fillable = ['pay_method', 'total_price', 'details', 'client_id'];

    // public function venta_cliente()
    // {
    // 	return $this->belongsToMany(venta_cliente::class);
    // }

    public function client()
    {
    	return $this->belongsTo(Client::class);
    }

    public function venta_producto()
    {
    	return $this->hasOne(venta_productos::class);
    }
}

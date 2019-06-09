<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
	protected $fillable = ['pay_method', 'total_price', 'venta_cliente_id'];

    public function venta_cliente()
    {
    	return $this->belongsToMany(venta_cliente::class);
    }
}

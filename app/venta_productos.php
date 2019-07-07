<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class venta_productos extends Model
{
    protected $fillable = ['product_id', 'venta_id'];
    // protected $table = 'venta_clientes';

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }

    public function venta()
    {
    	return $this->belongsTo(Venta::class);
    }
}

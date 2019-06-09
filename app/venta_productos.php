<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class venta_productos extends Model
{
    protected $fillable = ['product_id', 'client_id'];
    // protected $table = 'venta_clientes';

    public function client()
    {
    	return $this->belongsTo(Client::class);
    }

    public function venta()
    {
    	return $this->hasMany(Venta::class);
    }
}

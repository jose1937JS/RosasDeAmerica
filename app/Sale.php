<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['people_id', 'quantity', 'amount', 'pay_method', 'state', 'address_one', 'address_two', 'customer_email', 'customer_phone'];

    public function product_sale()
    {
    	return $this->hasOne('App\ProductSale');
    }

    public function people()
    {
    	return $this->belongsTo('App\People');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['people_id', 'quantity', 'amount', 'pay_method', 'state', 'address_one', 'address_two', 'customer_email', 'customer_phone'];

    // public function product()
    // {
    // 	return $this->belongsTo('App\Product');
    // }

    // public function people()
    // {
    // 	return $this->belongsTo('App\people');
    // }
}

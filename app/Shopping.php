<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shopping extends Model
{
	protected $table    = 'shopping';
    protected $fillable = ['total_price', 'pay_method', 'supplier_id'];

    public function supplier()
    {
    	return $this->belongsTo('App\Supplier');
    }

    public function shopping_product()
    {
    	return $this->hasOne(Shopping_products::class);
    }
}

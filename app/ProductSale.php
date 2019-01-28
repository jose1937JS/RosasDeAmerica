<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSale extends Model
{
    protected $table = 'product_sales';
    protected $fillable = ['product_id', 'quantity','sale_id'];


	public function sale()
    {
    	return $this->belongsTo('App\Sale');
    }

    public function product()
    {
    	return $this->belongsTo('App\Product');
    }
}

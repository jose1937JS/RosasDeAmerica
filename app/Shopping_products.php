<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shopping_products extends Model
{
    protected $fillable = ['product', 'quantity', 'restante', 'price', 'status', 'shopping_id'];

    public function shopping()
    {
    	return $this->belongsTo(Shopping::class);
    }

    public function product_detail()
    {
    	return $this->belongsTo(Product_detail::class);
    }
}

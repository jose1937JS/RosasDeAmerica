<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = ['product', 'description', 'image', 'type', 'price', 'quantity', 'category_id', 'product_detail_id'];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function sale()
    {
    	return $this->belongsTo('App\Sale');
    }

    public function product_detail()
    {
    	return $this->belongsTo(Product_detail::class);
    }

    public function venta_producto()
    {
        return $this->hasOne(venta_productos::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_detail extends Model
{
    protected $fillable = ['quantity', 'client_price', 'shopping_product_id'];

    public function shopping_product()
    {
    	return $this->HasMany(Shopping_product::class);
    }

    public function product()
    {
    	return $this->hasMany(Product::class);
    }
}

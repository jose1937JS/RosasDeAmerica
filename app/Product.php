<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = ['product', 'description', 'quantity', 'price', 'category_id'];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function sale()
    {
    	return $this->belongsTo('App\Sale');
    }
}

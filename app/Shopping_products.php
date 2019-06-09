<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shopping_products extends Model
{
    protected $fillable = ['product', 'quantity', 'price', 'shopping_id'];

    public function shopping()
    {
    	return $this->belongsTo(Shopping::class);
    }
}

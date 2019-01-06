<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shopping extends Model
{
	protected $table    = 'shopping';
    protected $fillable = ['product', 'quantity', 'supplier', 'pay_method'];
}

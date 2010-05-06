<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addItem(Request $req)
    {
   		$producto = $req->input('producto');
   		$cantidad = $req->input('cantidad');
   		$precio   = $req->input('precio');

		Cart::add(['nombre' => $producto, 'cantidad' => $cantidad, 'precio' => $precio]);

		dd(Cart::content());
    }

    public function getItems(Request $req, $rowId)
    {
    	dd(Cart::get($rowId));
    }
}

<?php

use Illuminate\Http\Request;


// aqui esta la documentecion de la herramienta, la necesitgaras para mostrar en las vistas los totales, el tax (iva), y demas cosas ===> https://github.com/Crinsane/LaravelShoppingcart

// RUTA PARA AÑADIR UN ELEMENTO AL CARRITO.
Route::post('add', function(Request $req){

	$id    = $req->input('id');
	$name  = $req->input('name');
	$qty   = $req->input('qty');
	$price = $req->input('price');

	Cart::add(['id' => $id, 'name' => $name, 'qty' => $qty, 'price' => $price]);

	return redirect('test');

});

// RUTA PARA MOSTRAR UN ELEMENTO DEL CARRO EN PARTICULAR
Route::get('get/{rowId}', function($rowId){

	$item = Cart::get($rowId);

	// return view('', ['item' => $item]);

});

// RUTA QUE MUESTRA TODOS LOS ELEMENTOS DENTRO DEL CARRITO
Route::get('allitems', function(){

	$items = Cart::content();

	return view('test', ['items' => $items]);

});


Route::post('edititem', function(Request $req, $rowId) {

	$rowId = $req->input('rowid');

	$name  = $req->input('name');
	$qty   = $req->input('qty');
	$price = $req->input('price');

	Cart::update($rowId, ['name' => $name, 'qty' => $qty, 'price' => $price]);

	// return redirect('somewhere');

});

Route::post('deleteitem', function (Request $req){

	$rowId = $req->input('rowid');

	Cart::remove($rowId);

	// return redirect('somewhere');

});





Route::get('test', function () {

	$items = Cart::content();

	return view('test', ['items' => $items]);

});
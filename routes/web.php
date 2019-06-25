<?php

use Illuminate\Http\Request;

use App\Http\Middleware\isAdmin;

use App\User;
use App\InfoPagoMovil;
use App\InfoTransferencia;


// RUTA PARA AÑADIR UN ELEMENTO AL CARRITO.
Route::get('add/{idd}/{namee}/{qtyy}/{pricee}', function($idd, $namee, $qtyy, $pricee){

	$id    = $idd;
	$name  = $namee;
	$qty   = $qtyy;
	$price = $pricee;

	$rowId = [];

	$items = Cart::content();

	foreach ($items as $key => $item) {
		$rowId[] = $key;
	}

	for ($i=0; $i < count($rowId); $i++)
	{
		if ( Cart::get($rowId[$i])->id == $id )
		{
			$q = Cart::get($rowId[$i])->qty;
			Cart::update($rowId[$i], ['qty' => $q + $qty]);
			echo Cart::count();
			return;
		}
	}

	Cart::add(['id' => $id, 'name' => $name, 'qty' => $qty, 'price' => $price]);

	echo Cart::count();

});

Route::post('edititem', function(Request $req, $rowId) {

	$rowId = $req->input('rowid');

	$name  = $req->input('name');
	$qty   = $req->input('qty');
	$price = $req->input('price');

	Cart::update($rowId, ['name' => $name, 'qty' => $qty, 'price' => $price]);

});

Route::post('deleteitem', function (Request $req){

	$rowId = $req->input('rowid');

	Cart::remove($rowId);

	return redirect('checkout');
});

Route::post('destroy', function (){

	Cart::destroy();

	return redirect('checkout');
});

Route::get('count', function (){ echo Cart::count(); });


Route::get('checkout', function(Request $req) {

	$id = Auth::user()->id;
	$user = User::find($id);
	
	$pagoMovil 		= InfoPagoMovil::all();
	$transferencias = InfoTransferencia::all();
	
	$productos = Cart::content();
	$total     = Cart::total(2, '.', '');
	$tax 	   = Cart::tax(2, ',', '.');
	$subtotal  = Cart::subtotal(2, ',', '.');
	$cantidad  = Cart::count();

	$ids = [];

	foreach( $productos as $key => $item ) { $ids[] = Cart::get($key)->id; }

	return view('user.checkout')
		->with('pagoMovil', $pagoMovil)
		->with('transferencias', $transferencias)
		->with('user', $user)
		->with('productos', $productos)
		->with('cantidad', $cantidad)
		->with('tax', $tax)
		->with('subtotal', $subtotal)
		->with('total', $total)
		->with('ids', $ids);

})->middleware('auth')->name('checkout');

Route::get('/','HomeController@index');

// Route::get('password/reset/{token}', 'ReiniciarClaveController@showResetForm');
// Route::post('clave/email', 'OlvidoClaveController@sendResetLinkEmail');
// Route::post('password/reset', 'ReiniciarClaveController@reset');

Route::get('login', 'LoginController@index')->name('login');
Route::get('register', 'RegisterController@showRegistrationForm');
Route::post('register', 'RegisterController@register');
Route::post('login', 'LoginController@login');
Route::post('logout', 'LoginController@logout')->name('logout');

Route::post('tarjeta', 'HomeController@tarjeta');

Route::get('home', 'HomeController@home')->middleware('auth');
Route::get('product/{id}', 'HomeController@product')->where('id', '^\d+$');
Route::get('producto/{id}', 'HomeController@producto')->where('id', '^\d+$'); // wiht json respoonse

Route::get('about', 'HomeController@about')->name('about');
Route::get('profile', 'HomeController@profile')->middleware('auth');;
Route::post('editprofile', 'HomeController@editprofile');

Route::get('admin', 'AdminController@index');
Route::get('pedidos/{status}', 'AdminController@pedidos')->where('status', '^(pagado|despachado)$');
Route::get('pedidos/local', 'AdminController@pedidoslocal');

Route::get('compras', 'AdminController@proveedores');
Route::get('compra/{id}', 'AdminController@compraproveedor')->where('id', '^[0-9]+$');
Route::post('addcategoria', 'AdminController@addcategoria');
Route::post('addcompraproveedor', 'AdminController@addcompraproveedor');
Route::post('addproduct', 'AdminController@addproduct');
Route::post('editproduct/', 'AdminController@editproduct');
Route::post('marcarcomodespachado', 'AdminController@marcarcomodespachado');

Route::get('categoria/{category}', 'HomeController@categoria')->where('category', '^[a-zA-Z]+$');
Route::post('busqueda', 'HomeController@busqueda');

Route::post('instapago', 'HomeController@instapago');

Route::post('addsupplier', 'AdminController@addsupplier');


Route::get('factura', 'HomeController@factura');
Route::get('compra', 'AdminController@compra');

Route::post('newsale', 'AdminController@newsale');
Route::get('cedula', 'AdminController@cedula');

Route::get('productos', 'AdminController@productos');


Route::get('cuentas', 'AdminController@cuentas');

Route::post('addCuentaTransferencia', 'AdminController@addCuentaTransferencia');
Route::post('BorrarCuentaTransferencia/{id}', 'AdminController@BorrarCuentaTransferencia');

Route::post('addCuentaPagoMovil', 'AdminController@addCuentaPagoMovil');
Route::post('BorrarCuentaPagoMovil/{id}', 'AdminController@BorrarCuentaPagoMovil');
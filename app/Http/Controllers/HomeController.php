<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;
// use Barryvdh\DomPDF\ServiceProvider as PDF;

use App\Product;
use App\Category;
use App\Sale;
use App\ProductSale;

class HomeController extends Controller
{
	public function __construct()
	{
		// dd(preg_match('/^[0-9]{2}\/[0-9]{2}$/', '11/22'));
	}

	public function index()
	{
		$products   = Product::all();
		$categorias = Category::all();

		return view('user.home')
				->with('products', $products)
				->with('categorias', $categorias);
	}

	public function home()
	{
		$products   = Product::all();
		$categorias = Category::all();

		return view('user.home')
				->with('categorias', $categorias)
				->with('products', $products);
	}

	public function product($id)
	{
		$product    = Product::find($id);
		$categorias = Category::all();

		return view('user.product')
				->with('categorias', $categorias)
				->with('product', $product);
	}

	public function producto($id)
	{
		$product = Product::find($id);

		return response()->json([
			'id' 		  => $product->id,
			'product' 	  => $product->product,
			'description' => $product->description,
			'quantity' 	  => $product->quantity,
			'price' 	  => $product->price,
			'category_id' => $product->category_id
		]);
	}

	public function categories()
	{
		return 'Categorias';
	}

	public function about()
	{
		return 'vista de acerca de (about)';
	}

	public function tarjeta(Request $req)
	{
		$venta   = new Sale();
		$product = new Product();
		$psale   = new ProductSale();

		$productos = json_decode($req->input('productos'));

		foreach ($productos as $p)
		{
			$pr = $product->find($p->id);

			if ($p->qty > $pr->quantity)
			{
				return redirect('checkout')->with('errorcompra', "Compra rechazada, el producto excede la cantidad máxima disponible.");
			}
		}


		// instapago API

		$validatedData = $req->validate([
			'people_id'   => 'required|integer',
			'address_one' => 'required|string',
			'address_two' => 'nullable|string',
			'email' 	  => 'required|email',
			'phone' 	  => 'nullable|digits:11',
			'monto' 	  => 'required|numeric',
			'pay_method'  => 'required|string',
			'cc-number'   => 'required|digits_between:16,19',
			'cvc'   	  => 'required|digits:3',
			'nameincard'  => 'required|regex:/^[a-zA-Z]+(?:\s?[a-zA-Z]\s?)+$/',
			'vencimiento' => 'required|regex:/^[\d]{2}\/[\d]{2}$/',
			'referencia'  => 'nullable|numeric'
		]);

		dd($validatedData);

		$venta->people_id      = $req->input('people_id');
		$venta->address_one    = $req->input('address_one');
		$venta->address_two    = $req->input('address_two');
		$venta->customer_email = $req->input('email');
		$venta->customer_phone = $req->input('phone');
		$venta->amount 	       = $req->input('monto');
		$venta->pay_method     = $req->input('pay_method');
		$venta->nro_referencia = $req->input('referencia');
		$venta->state 	       = 'pagado';

		$venta->save();

		$saleid = DB::select("SELECT MAX(id) as lastid FROM sales");

		foreach ($productos as $p)
		{
			// Restar la cantidad de los productos q compro a la cantidad de productos totales y guardarlo en db
			$pr = $product->find($p->id);
			$pr->quantity = $pr->quantity - $p->qty;
			$pr->save();

			$psale->create([
				'product_id' => $p->id,
				'quantity'   => $p->qty,
				'sale_id'    => $saleid[0]->lastid
			]);
		}

		// return something than instapago api would return

		//  Elimina los productos q estan en el carrito
		Cart::destroy();

		// redirige a la vista checkut
		return redirect('checkout');
	}

}
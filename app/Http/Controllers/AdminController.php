<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\Product;
use App\Category;
use App\Shopping;
use App\Sale;

class AdminController extends Controller
{
	public function __construct(Request $request)
	{
		// $this->middleware('isAdmin');
		$this->middleware('auth');
	}

	public function index(Request $request)
	{
		if ($request->user()->authorizeRoles(['admin']))
		{
			$category = Category::all();

			$productos = DB::table('products')
						->join('categories', 'products.category_id', '=', 'categories.id')
						->select('products.id','products.product','products.price','products.quantity','categories.category')
						->get();

			return view('admin.dashboard')
					->with('productos', $productos)
					->with('categorias', $category);
		}
	}

	public function pedidos($status)
	{
		$category = Category::all();

		$products = DB::table('product_sales')
					->select('product_sales.*', 'products.product')
					->join('products', 'product_sales.product_id', '=', 'products.id')
					->get();

		$ventas = DB::table('sales')
					->join('people', 'sales.people_id', '=', 'people.id')
					->select('sales.state','sales.id','sales.amount','sales.pay_method','sales.address_one','sales.address_two','sales.customer_email','sales.customer_phone','sales.nro_referencia','sales.created_at','people.first_name', 'people.last_name', 'people.pin', 'people.address', 'people.phone', 'people.email')
					->where('sales.state', $status)
					->get();

		foreach ($ventas as $k => $v)
		{
			foreach ($products as $key => $value)
			{
				if ($v->id == $value->sale_id) {
					$v->productos[] = $value;
				}
			}
		}

		return view('admin.pedidos')
				->with('ventas', $ventas)
				->with('categorias', $category);
	}

	public function proveedores(Request $req)
	{
		$compras  = Shopping::all();
		$category = Category::all();

		return view('admin.proveedores')
			->with('compras', $compras)
			->with('categorias', $category);
	}

	public function marcarcomodespachado(Request $req)
	{
		$sale = Sale::find($req->input('idsale'));
		$sale->state = 'despachado';

		$sale->save();

		return redirect('pedidos/despachado');
	}

	public function addcategoria(Request $req)
	{
		$cat = new Category();

		$cat->category = $req->input('categoria');
		$cat->save();

		return redirect('admin');
	}

	public function addcompraproveedor(Request $req)
	{
		$shopping = new Shopping();

		$shopping->product    = $req->input('producto');
		$shopping->quantity   = $req->input('cantidad');
		$shopping->supplier   = $req->input('proveedor');
		$shopping->price   	  = $req->input('precio');
		$shopping->pay_method = $req->input('pay_method');

		$shopping->save();

		return redirect('compras');
	}

	public function addproduct(Request $req)
	{
		$product = new Product();

		$product->product 	  = $req->input('producto');
		$product->quantity 	  = $req->input('cantidad');
		$product->description = $req->input('descripcion');
		$product->image 	  = $req->file('image')->store('');
		$product->price 	  = $req->input('precio');
		$product->category_id = $req->input('categoria');

		$product->save();

		return redirect('admin');
	}

	public function editproduct(Request $req)
	{
		$id = $req->input('idproducto');
		$product = Product::find($id);

		$oldfile = $product->image;

		$product->product 	  = $req->input('producto');
		$product->quantity 	  = $req->input('cantidad');
		$product->description = $req->input('descripcion');
		$product->image 	  = $req->file('image')->store('');
		$product->price 	  = $req->input('precio');
		$product->category_id = $req->input('categoria');

		$product->save();

		Storage::delete($oldfile);

		return redirect('admin');
	}

}
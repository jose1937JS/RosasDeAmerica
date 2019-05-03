<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;

use App\Product;
use App\Category;
use App\Shopping;
use App\Sale;
use App\Supplier;
use App\Client;
use App\Venta;
use App\venta_cliente;

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
			$category 	 = Category::all();
			$products    = Product::all();
			$proveedores = Supplier::all();

			$productos = DB::table('products')
						->join('categories', 'products.category_id', '=', 'categories.id')
						->select('products.id','products.product','products.price','products.quantity','categories.category')
						->get();

			return view('admin.dashboard')
					->with('productos', $productos)
					->with('proveedores', $proveedores)
					->with('categorias', $category)
					->with('products', $products);
		}
	}

	public function pedidos($status)
	{
		$category    = Category::all();
		$proveedores = Supplier::all();
		$products    = Product::all();

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
				->with('proveedores', $proveedores)
				->with('categorias', $category)
				->with('products', $products);
	}

	public function proveedores(Request $req)
	{
		$compras  	 = Shopping::all();
		$category 	 = Category::all();
		$products    = Product::all();
		$proveedores = Supplier::all();

		return view('admin.proveedores')
			->with('compras', $compras)
			->with('proveedores', $proveedores)
			->with('categorias', $category)
			->with('products', $products);
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

		$shopping->product     = $req->input('producto');
		$shopping->quantity    = $req->input('cantidad');
		$shopping->supplier_id = $req->input('proveedor');// iddelproveedor
		$shopping->price   	   = $req->input('precio');
		$shopping->pay_method  = $req->input('pay_method');

		$shopping->save();

		return redirect('admin');
	}

	public function addproduct(Request $req)
	{
		$product = new Product();

		$product->product 	  = $req->input('producto');
		$product->quantity 	  = $req->input('cantidad');
		$product->description = $req->input('descripcion');
		$product->price 	  = $req->input('precio');
		$product->category_id = $req->input('categoria');

		if ($req->file('image')) {
			$path = Storage::disk('public')->put('images', $req->file('image'));
			// $product->fill(['file' => asset($path)])->save();
			$product->image = $path;
		}

		$product->save();

		return redirect('admin');
	}

	public function editproduct(Request $req)
	{
		$id = $req->input('idproducto');
		$product = Product::find($id);

		$oldfile = $product->image;

		// dd($oldfile);

		$product->product 	  = $req->input('producto');
		$product->quantity 	  = $req->input('cantidad');
		$product->description = $req->input('descripcion');

		if ( $req->file('image') )
		{
			Storage::delete($oldfile);
			$path = Storage::disk('public')->put('images', $req->file('image'));
			$product->image = $path;
		}
		else {
			$product->image = $oldfile;
		}

		$product->price 	  = $req->input('precio');
		$product->category_id = $req->input('categoria');

		$product->save();

		return redirect('admin');
	}

	public function addsupplier(Request $req)
	{
		$supplier = new Supplier();

		$supplier->name    = $req->input('name');
		$supplier->address = $req->input('address');
		$supplier->phone   = $req->input('phone');
		$supplier->email   = $req->input('email');
		$supplier->rif     = $req->input('rif');

		$supplier->save();

		return back();
	}

	public function compra()
	{
		$data['data'] = Shopping::all()->last();

		$pdf = PDF::loadView('pdf.compra', $data);

		return $pdf->download("reporte-compra.pdf");
	}

	public function newsale(Request $req)
	{
		$productos  = $req->all();
		$keys 		= array_keys($productos);
		$array_keys = array_combine($keys, $keys);

		$filtered   = preg_grep("/(precio.?)|(producto.?)/", $array_keys);
		$productosc = collect($productos);

		dd($productos);

		// insertar el cliente si es nuevo

		if ( $req->newclient ) {

			$client = Client::where('cedula', $req->cedula)->get();

			if ( !$client->all())
			{
				$client = new Client();

				$client->cedula 	= $req->cedula; 
				$client->first_name = $req->nombre; 
				$client->last_name  = $req->apellido; 
				$client->phone  	= $req->telefono; 
				$client->address  	= $req->direccion;

				$client->save();

				$clientid = Client::where('cedula', $req->cedula)->get();
			}
			else {
				$clientid = Client::where('cedula', $req->cedula)->get();
				// REDIRECCIONAR CON UN MENSAJE FLASH
				return redirect('admin');
			}
		}
		else {
			$clientid = Client::where('cedula', $req->cedula)->get();
		}
		
		if ( count($filtered) > 1 )
		{
			$productoi = ['producto'];
			$precioi   = ['precio'];

			for ( $i=1; $i <= count($filtered); $i++ )
			{
				$productoi[] = "producto-$i";
				$precioi[]   = "precio-$i";
			}
			
			$result  = $productosc->only($productoi);
			$precios = $productosc->only($precioi);

			// itrerar para insertar en la tabla pivote
			foreach ($result as $key => $value)
			{
				// insertar datos en al tabla pivote venta_clientes
				$ventaclientes 			   = new venta_cliente();
				$ventaclientes->product_id = $value;
				$ventaclientes->client_id  = $clientid[0]->id;
				$ventaclientes->save();
				
				$lastidventacliente = DB::table('venta_clientes')->selectRaw('MAX(id) as lastid')->get();

				$venta 					 = new Venta();
				$venta->pay_method 		 = $req->metpago;
				$venta->total_price 	 = array_sum($precios->all());
				$venta->venta_cliente_id = $lastidventacliente[0]->lastid;
			}
		}
		else {
			// $result = $productosc->only(['producto', 'precio']);
			$result = $productosc->only(['producto']);

			$ventaclientes 			   = new venta_cliente();
			$ventaclientes->product_id = $value;
			$ventaclientes->client_id  = $clientid[0]->id;
			$ventaclientes->save();
		}

		dd($result);
		return redirect('admin');
	}

	public function cedula(Request $req)
	{
		return Client::where('cedula', $req->cedula)->get();
	}

	public function productos(Request $req)
	{
		return product::all();
	}


}

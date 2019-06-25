<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use App\Product;
use App\Category;
use App\Shopping;
use App\Sale;
use App\Supplier;
use App\Client;
use App\Venta;
use App\venta_productos;
use App\Shopping_products;
use App\InfoPagoMovil;
use App\InfoTransferencia;

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

			$cant = DB::table('sales')->where('state', 'pagado')->count();

			return view('admin.dashboard')
					->with('productos', $productos)
					->with('cant', $cant)
					->with('proveedores', $proveedores)
					->with('categorias', $category)
					->with('products', $products);
		}
	}

	public function cuentas(Request $request)
	{
		if ($request->user()->authorizeRoles(['admin']))
		{
			$category 	 = Category::all();
			$products    = Product::all();
			$proveedores = Supplier::all();

			$pagomovil 	   = InfoPagoMovil::all();
			$transferencias = InfoTransferencia::all();

			$cant = DB::table('sales')->where('state', 'pagado')->count();

			return view('admin.cuentasbanco')
					->with('cant', $cant)
					->with('pagomovil', $pagomovil)
					->with('transferencias', $transferencias)
					->with('proveedores', $proveedores)
					->with('categorias', $category)
					->with('products', $products);
		}
	}

	public function pedidos(Request $request, $status)
	{
		if ($request->user()->authorizeRoles(['admin']))
		{
			$category    = Category::all();
			$proveedores = Supplier::all();
			$products    = Product::all();


			$products = DB::table('product_sales')
						->select('product_sales.*', 'products.product', 'products.price')
						->join('products', 'product_sales.product_id', '=', 'products.id')
						->get();

			$ventas = DB::table('sales')
						->join('people', 'sales.people_id', '=', 'people.id')
						->select('sales.state','sales.description', 'sales.id','sales.amount','sales.pay_method','sales.address_one','sales.address_two','sales.customer_email','sales.customer_phone','sales.nro_referencia','sales.created_at','people.first_name', 'people.last_name', 'people.pin', 'people.address', 'people.phone', 'people.email')
						->where('sales.state', $status)
						->get();

			$cant = DB::table('sales')->where('state', 'pagado')->count();
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
					->with('cant', $cant)
					->with('proveedores', $proveedores)
					->with('categorias', $category)
					->with('products', $products);
		}
	}

	public function pedidoslocal(Request $request)
	{
		if ($request->user()->authorizeRoles(['admin']))
		{
			$category    = Category::all();
			$proveedores = Supplier::all();
			$products 	 = DB::table('product_sales')
							->select('product_sales.*', 'products.product', 'products.price')
							->join('products', 'product_sales.product_id', '=', 'products.id')
							->get();

			$ventas      = DB::table('ventas')
							->select('ventas.pay_method', 'ventas.client_id as id', 'ventas.total_price', 'clients.cedula', 'clients.first_name', 'clients.last_name', 'clients.phone', 'clients.address', 'products.product', 'products.price', 'venta_productos.product_id')
							->join('venta_productos', 'ventas.id', '=', 'venta_productos.venta_id')
							->join('products', 'venta_productos.product_id', '=', 'products.id')
							->join('clients', 'ventas.client_id', '=', 'clients.id')
							->get();
			$cant = DB::table('sales')->where('state', 'pagado')->count();

			return view('admin.pedidoslocal')
					->with('proveedores', $proveedores)
					->with('cant', $cant)
					->with('categorias', $category)
					->with('products', $products)
					->with('ventas', $ventas);
		}
	}

	public function proveedores(Request $req)
	{
		if ($req->user()->authorizeRoles(['admin']))
		{
			$compras  	 = Shopping::all();
			$category 	 = Category::all();
			$products    = Product::all();
			$proveedores = Supplier::all();

			$cant = DB::table('sales')->where('state', 'pagado')->count();

			return view('admin.proveedores')
				->with('compras', $compras)
				->with('cant', $cant)
				->with('proveedores', $proveedores)
				->with('categorias', $category)
				->with('products', $products);
		}
	}

	public function compraproveedor($id)
	{
		$r = DB::table('shopping')
				->join('shopping_products', 'shopping.id', '=', 'shopping_products.shopping_id')
				->join('suppliers', 'suppliers.id', '=', 'shopping.supplier_id')
				->select('suppliers.name','suppliers.email','suppliers.phone','suppliers.rif','shopping.id as idcompra','shopping.total_price','shopping.pay_method','shopping.created_at','shopping_products.product', 'shopping_products.quantity', 'shopping_products.price')
				->where('shopping.id', $id)
				->get();

		$supplier = collect($r[0])->only('name', 'email','phone','rif', 'idcompra');
		$shopping = collect($r[0])->only('created_at', 'idcompra');
		
		
		for ($i=0; $i < count($r); $i++) { 

			$products[] = collect($r[$i])->only('product','price','quantity');
			$precios[]  = $products[$i]['price'] * $products[$i]['quantity'];
		}


		$price = array_sum($precios);

		// return view('pdf.compra')
		// 	->with('supplier', $supplier)
		// 	->with('shopping', $shopping)
		// 	->with('price', $price)
		// 	->with('products', $products);

		QrCode::format('png')->size(150)->generate($shopping['idcompra'], "./qrcodes/compraproveedor.png");

		$pdf = PDF::loadView('pdf.compra', ['supplier' => $supplier, 'shopping' => $shopping, 'price' => $price, 'products' => $products]);

		return $pdf->download("reporte-compra-proveedor.pdf");
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
		$formdata   = $req->all();
		$keys 		= array_keys($formdata);
		$array_keys = array_combine($keys, $keys);

		$filtered   = preg_grep("/(precio.?)|(producto.?)|(cantidad.?)/", $array_keys);
		$productosc = collect($formdata);

		$productoi = ['producto-0'];
		$precioi   = ['precio-0'];
		$cantidadi = ['cantidad-0'];

		for ( $i=1; $i <= (count($filtered) / 3) - 1; $i++ )
		{
			$productoi[] = "producto-$i";
			$precioi[]   = "precio-$i";
			$cantidadi[] = "cantidad-$i";
		}
		
		$productos = $productosc->only($productoi);
		$cantidads = $productosc->only($cantidadi);
		$precios   = $productosc->only($precioi);

		for ($i=0; $i < count($cantidads); $i++) { 
			
			$precio[] = $cantidads["cantidad-$i"] * $precios["precio-$i"];
		}


		$shopping = new Shopping();
		
		$shopping->total_price = array_sum($precio);
		$shopping->pay_method  = $req->pay_method;
		$shopping->supplier_id = $req->proveedor;

		$shopping->save();

		$lastshopping = DB::table('shopping')->selectRaw('MAX(id) as lastid')->get();


		for ($i=0; $i < count($productos); $i++)
		{
			$shoppingpro = new Shopping_products();
			
			$shoppingpro->product 	  = $productos["producto-$i"];
			$shoppingpro->quantity 	  = $cantidads["cantidad-$i"];
			$shoppingpro->price       = $precios["precio-$i"];
			$shoppingpro->shopping_id = $lastshopping[0]->lastid;
			
			$shoppingpro->save();
		}

		return redirect('compras');
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
				return redirect('admin')->with('clienteregistrado', 'El cliente ya estaba registrado, abortando operación.');
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


			// insertar la venta
			$venta 					 = new Venta();
			$venta->pay_method 		 = $req->metpago;
			$venta->total_price 	 = array_sum($precios->all());
			$venta->details 		 = $req->descripcion;
			$venta->client_id 		 = $clientid[0]->id;
			$venta->save();


			$lastidventa = DB::table('ventas')->selectRaw('MAX(id) as lastid')->get();


			// itrerar para insertar en la tabla pivote
			foreach ($result as $key => $value)
			{
				// insertar datos en al tabla pivote venta_productos
				$ventaproducto 			   = new venta_productos();
				$ventaproducto->product_id = $value;
				$ventaproducto->venta_id   = $lastidventa[0]->lastid;
				$ventaproducto->save();

				// Restar un producto del almacen
				$p = Product::find($value);
				$p->quantity = $p->quantity - 1;
				$p->save();
				
				// $lastidventacliente = DB::table('venta_productos')->selectRaw('MAX(id) as lastid')->get();

			}
		}
		else {
			// $result = $productosc->only(['producto', 'precio']);
			$result = $productosc->only(['producto']);

			$ventaclientes 			   = new venta_productos();
			$ventaclientes->product_id = $value;
			$ventaclientes->venta_id   = $lastidventa[0]->lastid;
			$ventaclientes->save();
		}

		return redirect('admin')->with('ventaclienterealizada', 'Venta realizada satisfactoriamente.');
	}

	public function cedula(Request $req)
	{
		return Client::where('cedula', $req->cedula)->get();
	}

	public function productos(Request $req)
	{
		$ps = product::all();
		
		$a = $ps->contains('quantity', 0);

		if ($a) {
			foreach ($ps as $key => $value) {
				if ($value->quantity <= 0) {
					$ids[] = $key;
				}
			}
		}
		else {
			return $ps;
		}

		// BUG CON LA FUNCION EXCEPT DE LAREAVEL
		return $ps->except($ids);
	}



	public function addCuentaTransferencia(Request $req)
	{
		$transferencia = new InfoTransferencia;

		$transferencia->banco 		= $req->banco;
		$transferencia->nro_cuenta  = $req->nro_cuenta;
		$transferencia->tipo_cuenta = $req->tipo_cuenta;
		$transferencia->titular 	= $req->titular;
		$transferencia->cedula 		= $req->cedula;
		$transferencia->correo 		= $req->correo;
		$transferencia->telefono  	= $req->telefono;

		$transferencia->save();

		return back();
	}

	public function BorrarCuentaTransferencia($id)
	{
		InfoTransferencia::find($id)->delete();

		return back();
	}

	public function addCuentaPagoMovil(Request $req)
	{
		$pm = new InfoPagoMovil;

		$pm->cedula 	= $req->cedula;
		$pm->banco  	= $req->banco;
		$pm->cod_banco  = $req->cod_banco;
		$pm->telefono 	= $req->telefono;

		$pm->save();

		return back();	
	}

	public function BorrarCuentaPagoMovil($id)
	{
		InfoPagoMovil::find($id)->delete();

		return back();
	}


}

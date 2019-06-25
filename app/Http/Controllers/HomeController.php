<?php


// Requisitos para instapago
// El Comercio debería cumplir con los siguientes requisitos para poder recibir pagos a travé de InstaPago:
// * Dominio propio
// * Certificado SSL
// * Código fuente propio o acceso al mismo
// * Alojamiento en servidor propio o terceros



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use Barryvdh\DomPDF\Facade as PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Illuminate\Support\Facades\Auth;

use App\Product;
use App\Category;
use App\Sale;
use App\ProductSale;
use App\User;
use App\People;
use App\InfoPagoMovil;
use App\InfoTransferencia;

class HomeController extends Controller
{
	public function __construct()
	{
		// dd(preg_match('/^[0-9]{2}\/[0-9]{2}$/', '11/22'));
	}

	public function index()
	{
		$products   = Product::paginate(6);
		$categorias = Category::all();

		return view('user.home')
				->with('products', $products)
				->with('categorias', $categorias);
	}

	public function home()
	{
		$products   = Product::paginate(6);
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

	public function about()
	{
		return view('user.nosotros');
	}

	public function profile()
	{
		$userid  = Auth()->user()->id;
		$usuario = User::find($userid);

		return view('user.profile')->with('user', $usuario);
	}

	public function editprofile(Request $req)
	{
		$peopleid = $req->input('personid');
		$userid   = $req->input('userid');

		$people = People::find($peopleid);
		$user   = User::find($userid);

		$req->validate([
			'nombre'    => 'required|max:255|regex:/^[a-zA-Z]+(?:\s?[a-zA-Z]\s?)+$/',
			'apellido'  => 'required|max:255|regex:/^[a-zA-Z]+(?:\s?[a-zA-Z]\s?)+$/',
			'direccion' => 'required|max:255|string',
			'telefono'  => 'required|string|max:11',
			'email'     => 'required|string|email|max:255',
			'user'      => 'required|string',
			'clave'     => 'required|string|min:6|confirmed',
		]);

		$people->first_name = $req->input('nombre');
		$people->last_name  = $req->input('apellido');
		$people->email 		= $req->input('email');
		$people->phone 		= $req->input('telefono');
		$people->address 	= $req->input('direccion');

		$people->save();

		$user->user 	 = $req->input('user');
		$user->password  = bcrypt($req->input('clave'));
		$user->people_id = $peopleid;

		$user->save();

		return redirect('profile')->with('success', 'Perfil editado satisfactoriamente.');
	}

	public function categoria($categoria)
	{
		$categorias  = Category::all();
		$idcategoria = DB::table('categories')->select('id')->where('category', $categoria)->get();
		$productos   = Product::where('category_id', $idcategoria[0]->id)->paginate(6);
		// $productos = DB::table('products')
		// 		->join('categories', 'categories.id', '=', 'products.category_id')
		// 		->select('products.id', 'products.product', 'products.description', 'products.quantity', 'products.price', 'categories.category')
		// 		->where('category_id', $idcategoria[0]->id)
		// 		->get();

		return view('user.home')
				->with('products', $productos)
				->with('categorias', $categorias);
	}

	public function busqueda(Request $req)
	{
		$categorias = Category::all();
		$busqueda   = $req->input('search');

		$producto = Product::where('product', $busqueda)->paginate(6);

		return view('user.home')
				->with('products', $producto)
				->with('categorias', $categorias);

	}

	//  Funcion q procesa la solicitud de la compra
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

		$validatedData = $req->validate([
			'people_id'   => 'required|integer',
			'address_one' => 'required|string',
			'address_two' => 'nullable|string',
			'email' 	  => 'required|email',
			'phone' 	  => 'nullable|digits_between:10,11',
			'monto' 	  => 'required|numeric',
			'description' => 'required|string',
			'pay_method'  => 'required|string',
			// 'cc-number'   => 'nullable|digits_between:16,19',
			// 'cvc'   	  => 'nullable|digits:3',
			// 'nameincard'  => 'nullable|regex:/^[a-zA-Z]+(?:\s?[a-zA-Z]\s?)+$/',
			// 'vencimiento' => 'nullable|regex:/^[\d]{2}\/[\d]{2}$/',
			'referencia'  => 'nullable|numeric'
		]);

		$venta->people_id      = $req->input('people_id');
		$venta->address_one    = $req->input('address_one');
		$venta->address_two    = $req->input('address_two');
		$venta->customer_email = $req->input('email');
		$venta->customer_phone = $req->input('phone');
		$venta->amount 	       = $req->input('monto');
		$venta->description    = $req->input('description');
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
		return redirect('checkout')->with('success', 'La compra se ha realizado satisfactoriamente, recuerda descargar tu factura en el botón temporal azul de abajo.');
	}

	// public function instapago(Request $req)
	// {
	// 	// Validando los campos para instapago

	// 	$validatedData = $req->validate([
	// 		'monto' 	  => 'required|numeric',
	// 		'cc_number'   => 'required|digits_between:16,19',
	// 		'cvc'   	  => 'required|digits:3',
	// 		'nameincard'  => 'required|regex:/^[a-zA-Z]+(?:\s?[a-zA-Z]\s?)+$/',
	// 		'vencimiento' => 'required|regex:/^[\d]{2}\/[\d]{2}$/',
	// 	]);

	// 	dd($validatedData);
	// }

	public function factura()
	{
		$id = Sale::all()->last()->id;
		$idpeople = Auth::user()->people_id;

		$data['data']   = ProductSale::where('sale_id', $id)->get();
		$data['people'] = People::where('id', $idpeople)->get();
		$data['iva']    = ($data['data'][0]->product->price * $data['data'][0]->quantity) * 0.12;

		$people = People::where('id', $idpeople)->get();
		$cedula = $people[0]->pin;

		QrCode::format('png')->size(150)->generate($cedula, "./qrcodes/facturacliente.png");

		$pdf = PDF::loadView('pdf.factura', $data);

		return $pdf->download("factura-$cedula.pdf");
	}


}
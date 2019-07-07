<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		// $this->call(ProductsTableSeeder::class);

		// factory(App\People::class, 2)->create();
		// factory(App\Category::class, 5)->create();
		// factory(App\Product::class, 9)->create();
		// factory(App\User::class, 1)->create();
		// factory(App\Role::class, 1)->create();


		// cuentas bancarias y pago movil

		DB::table('info_transferencias')->insert([
			[
				'banco' 	  => 'Banco de Venezuela',
				'nro_cuenta'  => '0102-0467-11-0000000000',
				'tipo_cuenta' => 'Corriente',
				'cedula' 	  => '240000001',
				'titular' 	  => 'Maria Perez',
				'correo' 	  => 'maria@perez.com',
				'telefono' 	  => '04240000000',
				'created_at'  => now()
			],
			[
				'banco' 	  => 'Banco Mercantil',
				'nro_cuenta'  => '0105-0098-26-0000000000',
				'tipo_cuenta' => 'Corriente',
				'cedula' 	  => '210000000',
				'titular' 	  => 'Yessebel Avila',
				'correo' 	  => 'yesse@avila.com',
				'telefono' 	  => '04120001110',
				'created_at'  => now()
			],
		]);
		DB::table('info_pago_movils')->insert([
			[
				'cedula' 	  => '10000000',
				'banco' 	  => 'Banco Mercantil',
				'cod_banco'   => '0105',
				'telefono' 	  => '04240000000',
				'created_at'  => now()
			],
			
		]);

		DB::table('people')->insert([
			'pin' => '00000001',
			'first_name' => 'Admin',
			'last_name' => 'Istrador',
			'email' => 'admin@admin.com',
			'phone' => '0011010011',
			'address' => 'Without Location',
			'created_at' => now()
		]);

		// llenado de categoria
		DB::table('categories')->insert([
			'category' => 'Arreglos',
			'created_at' => now()
		]);

		// llenado de suppliers
		DB::table('suppliers')->insert([
			'name' => 'Fernando',
			'address' => 'Avenida Libertador Caracas',
			'email' => 'fernando@gmail.com',
			'phone' => '04240000000',
			'rif' => 'J-12332100',
			'created_at' => now()
		]);

		// llenado de shopping table
		DB::table('shopping')->insert([
			'total_price' => '424995',
			'pay_method'  => 'Pago Movil',
			'supplier_id' => 1,
			'created_at'  => now()
		]);

		// llenado de shopping webona loca
		DB::table('shopping_products')->insert([
			[
				'product' => 'Margaritas',
				'quantity' => 2,
				'restante' => 1,
				'price' => '40000',
				'status' => '1',
				'shopping_id' => 1,
				'created_at' => now()
			],
			[
				'product' => 'Turpiales',
				'quantity' => 5,
				'restante' => 3,
				'price' => '68999',
				'status' => '1',
				'shopping_id' => 1,
				'created_at' => now()
			]
		]);

		// llenado de priduct_detaeils
		DB::table('product_details')->insert([
			'quantity' => 2,
			'client_price' => '25000',
			'shopping_product_id' => 1,
			'created_at' => now()
		]);


		// llenado de productos
		DB::table('products')->insert([
			[
				'product' 	  		=> 'Cañon de Flores',
				'description' 		=> 'CUestion con forma de cañon con muchas flores rosadas',
				'image' 	  		=> 'images/50405223_1731211286982880_2423251064145838080_n.jpg',
				'type' 		  		=> 'premium',
				'quantity' 	  		=> '5',
				'price' 	  		=> '190500',
				'category_id' 		=> 1,
				'product_detail_id' => 1,
				'created_at'  		=> now()
			],
			[
				'product' 	  		=> 'Detalle de Gerberas',
				'description' 		=> 'Rosas para evento social',
				'image' 	  		=> 'images/jxrqdedUC4pmCNFJ3PdQay8W9x0vwXdqNAZZVLgv.jpeg',
				'type' 		  		=> 'standar',
				'quantity'    		=> '9',
				'price' 	  		=> '19000',
				'category_id' 		=> 1,
				'product_detail_id' => 1,
				'created_at'  		=> now()
			]
		]);


		// llenado de clientes
		DB::table('clients')->insert([
			'cedula' 	 => '23111111',
			'first_name' => 'Yessebel',
			'last_name'  => 'Avila',
			'phone' 	 => '00000000001',
			'address' 	 => 'sevtor 2 de brisas del valle',
			'created_at' => now()
		]);

		// venta
		DB::table('ventas')->insert([
			'pay_method'  => 'Transferencia',
			'total_price' => '4000.00',
			'details' 	  => 'Esto es un texto detallado de como el cliente quiere su producto',
			'client_id'   => 1,
			'created_at'  => now()
		]);

		// llenado de venta_producto
		DB::table('venta_productos')->insert([
			'product_id' => 2,
			'venta_id' => 1,
			'created_at' => now()
		]);

		DB::table('users')->insert([
			'user' => 'admin',
			'password' => bcrypt('admin123'),
			'people_id' => 1,
			'created_at' => now()
		]);

		DB::table('roles')->insert([
			'name' => 'admin',
			'description' => 'Persona que puede hacer tareas administrativas',
			'created_at' => now()
		]);

		DB::table('role_user')->insert([
			'role_id' => 1,
			'user_id' => 1,
			'created_at' => now()
		]);
	}
}

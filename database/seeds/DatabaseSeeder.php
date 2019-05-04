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


		DB::table('people')->insert([
			'pin' => '00000001',
			'first_name' => 'Admin',
			'last_name' => 'Istrador',
			'email' => 'admin@admin.com',
			'phone' => '0011010011',
			'address' => 'Without Location'
		]);

		// llenado de categoria
		DB::table('categories')->insert([
			'category' => 'Lacteos',
			'created_at' => now()
		]);

		// llenado de productos
		DB::table('products')->insert([
			'product' => 'Leche',
			'description' => 'LEche pasteurizada de cebra',
			'image' => '404.jpg',
			'quantity' => '5',
			'price' => '12000',
			'category_id' => 1,
			'created_at' => now()
		]);
		DB::table('products')->insert([
			'product' => 'Queso',
			'description' => 'queso llanero del lano plano',
			'image' => '404.jpg',
			'quantity' => '9',
			'price' => '19000',
			'category_id' => 1,
			'created_at' => now()
		]);


		// llenado de clientes
		DB::table('clients')->insert([
			'cedula' => '23111111',
			'first_name' => 'Yessebel',
			'last_name' => 'Avila',
			'phone' => '00000000001',
			'address' => 'sevtor 2 de brisas del valle',
			'created_at' => now()
		]);

		// llenado de venta_clientes
		DB::table('venta_clientes')->insert([
			'product_id' => 2,
			'client_id' => 1,
			'created_at' => now()
		]);

		DB::table('users')->insert([
			'user' => 'admin',
			'password' => bcrypt('admin123'),
			'people_id' => 1,
		]);

		DB::table('roles')->insert([
			'name' => 'admin',
			'description' => 'Persona que puede hacer tareas administrativas'
		]);

		DB::table('role_user')->insert([
			'role_id' => 1,
			'user_id' => 1
		]);
	}
}

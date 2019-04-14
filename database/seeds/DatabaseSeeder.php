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

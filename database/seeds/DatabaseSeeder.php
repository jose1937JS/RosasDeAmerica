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

		factory(App\City::class, 20)->create();
		factory(App\State::class, 12)->create();
		factory(App\People::class, 3)->create();
		factory(App\Category::class, 3)->create();
		factory(App\Product::class, 8)->create();
		factory(App\User::class, 1)->create();
	}
}

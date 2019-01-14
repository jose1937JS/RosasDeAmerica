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

		factory(App\People::class, 2)->create();
		factory(App\Category::class, 5)->create();
		factory(App\Product::class, 9)->create();
		factory(App\User::class, 1)->create();
	}
}

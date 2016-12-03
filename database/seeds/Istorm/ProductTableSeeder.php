<?php

use App\Models\Photo\Photo;
use App\Models\Product\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::connection()->getDriverName() == 'mysql') {
			DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		}

		// factory(Order::class, 5)->create()->each(function($o) {
		// 	$o->products()->save(factory(Product::class)->create());
		// });

		$products = Product::all();

		foreach ($products as $product) {

			$photo = factory(Photo::class)->create();

			$product->photos()->save($photo);
		}

		if (DB::connection()->getDriverName() == 'mysql') {
			DB::statement('SET FOREIGN_KEY_CHECKS=1;');
		}
    }
}

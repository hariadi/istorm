<?php

use App\Models\Order\Order;
use Illuminate\Database\Seeder;

class StormSeeder extends Seeder
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

		factory(Order::class, 5)->create();

		if (DB::connection()->getDriverName() == 'mysql') {
			DB::statement('SET FOREIGN_KEY_CHECKS=1;');
		}
    }
}

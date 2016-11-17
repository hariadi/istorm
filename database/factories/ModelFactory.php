<?php

use Carbon\Carbon;
use Faker\Generator;
use App\Models\Type\Type;
use App\Models\Order\Order;
use App\Models\Agency\Agency;
use App\Models\Product\Product;
use App\Models\Access\User\User;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(User::class, function (Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'confirmation_code' => md5(uniqid(mt_rand(), true)),
        'confirmed' => true,
        'agency_id' => function () {
            return factory(Agency::class)->create(['approver_id' => 1])->id;
        },
    ];
});

$factory->define(Agency::class, function (Generator $faker) {
    return [
    	'name' => $faker->company,
        'description' => $faker->word,
        'address' => $faker->address,
        'approver_id' => function () {
            return factory(User::class)->create()->id;
        },
    ];
});

$factory->define(Type::class, function (Generator $faker) {
    return [
    	'name' => $faker->sentence,
    ];
});

$factory->define(Product::class, function (Generator $faker) {
    return [
    	'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'agency_id' => function () {
            return factory(Agency::class)->create()->id;
        },
    	'name' => $faker->company,
        'description' => $faker->word,
        'capacity' => $faker->numberBetween(1, 100),
        'type_id' => function () {
            return factory(Type::class)->create()->id;
        },
    ];
});

$factory->define(Order::class, function (Generator $faker) {

	$start_date = Carbon::now()->addWeeks(2);

    return [
    	'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'product_id' => function () {
            return factory(Product::class)->create()->id;
        },
        'approver_id' => function () {
            return factory(User::class)->create()->id;
        },
    	'start_date' => $start_date,
        'end_date' => $start_date->addWeeks(2),
    ];
});

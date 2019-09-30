<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
 */

$factory->define(App\Address::class, function (Faker $faker) {
	static $password;

	return [
		
		
        'phone_number_1' => $faker->phoneNumber,
        'phone_number_2' => $faker->phoneNumber,
		'city' => $faker->city,
		'sub_city' => $faker->city,
        'location' => $faker->streetName,
        'building' => $faker->buildingNumber,
		'created_by' => $faker->numberBetween($min = 1, $max = 10),
	
	];
});



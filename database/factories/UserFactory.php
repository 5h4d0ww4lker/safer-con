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

$factory->define(App\User::class, function (Faker $faker) {
	static $password;

	return [
		'address' => factory('App\Address')->create()->id,
		'name' => $faker->firstName,
		'father_name' => $faker->lastName,
		'email' => $faker->unique()->safeEmail,
		'password' => $password ?: $password = bcrypt('demo'),
		
		'gender' => $faker->randomElements(['male', 'female']),
		'date_of_birth' => $faker->date($format = 'Y-m-d', $max = '2000-12-31'),
		'tin' => $faker->numberBetween($min = 1045678, $max = 105678945678),
		'role' => $faker->numberBetween($min = 1, $max = 3),
		'activation_status' => $faker->numberBetween($min = 0, $max = 4),
		
	];
});



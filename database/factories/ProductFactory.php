<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {

	$types = ['mens', 'womens'];
	$randTypes = array_rand($types, 1);

	return [
		'name' => $faker->word,
		'description' => $faker->sentence(),
		'price'=>$faker->numberBetween(1,100),
		'type' => $types[$randTypes],
		'image' => $faker->imageUrl()

	];
});


<?php

use Faker\Generator as Faker;

$factory->define(App\Catagory::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence($nbWords = 2, $variableNbWords = true),
        'description' => $faker->paragraphs(1,true)
    ];
});

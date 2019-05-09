<?php

use Faker\Generator as Faker;

$factory->define(App\Tags::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence($nbWords = 1, $variableNbWords = true)
    ];
});

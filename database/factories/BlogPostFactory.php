<?php

use Faker\Generator as Faker;

$factory->define(App\BlogPost::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'body' => $faker->paragraphs(rand(2,10),true),
        'user_id' => $faker->numberBetween($min = 1, $max = 200),
        'cat_id' => $faker->numberBetween($min = 26, $max = 50),
        'cover'=>$faker->image($dir = 'public/img/blog/cover/', $width = 800, $height = 400, 'technics', true),
    ];
});

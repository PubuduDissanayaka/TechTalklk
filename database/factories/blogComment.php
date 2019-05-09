<?php

use Faker\Generator as Faker;

$factory->define(App\BlogComment::class, function (Faker $faker) {
    return [
        'comment' => $faker->paragraphs(rand(1,2),true),
        'post_id' => $faker->numberBetween($min = 1, $max = 12),
        'user_id' => $faker->numberBetween($min = 1, $max = 200),
        
    ];
});

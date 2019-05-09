<?php

use Faker\Generator as Faker;

$factory->define(App\Event::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'description' => $faker->paragraphs(rand(2,5),true),
        'date'=> $faker->date($format = 'Y-m-d', $max = 'now'),
        'start'=>$faker->time($format = 'H:i:s', $max = 'now'),
        'end'=>$faker->time($format = 'H:i:s', $max = 'now'),
        'address'=>$faker->address(),
        'user_id' => $faker->numberBetween($min = 1, $max = 200),
        // 'cover'=>$faker->file($sourceDir = 'img/tmp/', $targetDir = 'img/events/cover/'),
        'cover'=>$faker->image($dir = 'public/img/events/cover/', $width = 800, $height = 400, 'technics', true),
        'latitude'=>$faker->latitude(),
        'longtitude'=>$faker->longitude()
    ];
});

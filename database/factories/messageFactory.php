<?php

use Faker\Generator as Faker;

$factory->define(App\Message::class, function (Faker $faker){
    return [
        'user_id' => $faker->numberBetween($min = 1 , $max = 31),
        'friend_id' => $faker->numberBetween($min = 1 , $max = 31),
        'chat' => $faker->text($maxNbChars = 20)
    ];

});


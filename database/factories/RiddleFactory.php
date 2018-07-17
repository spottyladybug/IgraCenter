<?php

use Faker\Generator as Faker;

$factory->define(App\Riddle::class, function (Faker $faker) {
    return [
        'text' => $faker->text( 20 ),
        'img' => $faker->word
    ];
});

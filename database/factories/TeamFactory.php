<?php

use Faker\Generator as Faker;

$factory->define(App\Team::class, function (Faker $faker) {
    return [
        'name' => ucfirst( $faker->word ),
        'captain' => 0
    ];
});

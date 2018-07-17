<?php

use Faker\Generator as Faker;

$factory->define(App\Station::class, function (Faker $faker) {
    return [
        'name' => ucfirst( $faker->word ),
        'moderator' => function() {
            return factory(App\User::class)->states('moderator')->create()->id;
        },
        'riddle' => function() {
            return factory(App\Riddle::class)->create()->id;
        }
    ];
});

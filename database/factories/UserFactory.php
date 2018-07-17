<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'vk_id' => $faker->randomNumber( 8 ),
    ];
});

$factory->state(App\User::class, 'administrator', [
    'user_group' => 0
]);

$factory->state(App\User::class, 'moderator', [
    'user_group' => 1
]);

$factory->state(App\User::class, 'player', [
    'user_group' => 2
]);
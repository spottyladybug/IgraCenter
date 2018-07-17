<?php

use Faker\Generator as Faker;

$factory->define(App\TeamTable::class, function (Faker $faker) {
    return [
        'team_id' => 0,
        'player_id' => 0
    ];
});

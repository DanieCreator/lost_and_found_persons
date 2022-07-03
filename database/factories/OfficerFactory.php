<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Officer;
use App\Station;
use Faker\Generator as Faker;

$factory->define(Officer::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class),
        'station_id' => factory(Station::class),
        'creator_id' => factory(User::class),
        'officer_number' => $faker->numberBetween(1000000, 2000000),
        'ocs' => false
    ];
});

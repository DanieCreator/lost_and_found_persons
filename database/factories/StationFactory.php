<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Station;
use Faker\Generator as Faker;

$factory->define(Station::class, function (Faker $faker) {
    return [
        'name' => $faker->streetName,
        'location' => $faker->state,
        'lat' => $faker->latitude(-4.04, 3.31),
        'lng' => $faker->longitude(34.56, 39.65),
    ];
});

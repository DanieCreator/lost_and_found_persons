<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Report;
use App\Officer;
use App\Station;
use Faker\Generator as Faker;

$factory->define(Report::class, function (Faker $faker) {

    return [
        'officer_id' => factory(Officer::class),
        'station_id' => factory(Station::class),
        'person_name' => $faker->name,
        'person_national_identification_number' => $faker->numberBetween(100000000, 40000000),
        'person_birth_certificate_number' => $faker->numberBetween(100000000, 80000000),
        'person_passport_number' => $faker->numberBetween(100000000, 20000000),
        'person_phone_number' => $faker->unique()->phoneNumber,
        'person_date_of_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'extra_items' => [
            'eye color' => 'green',
            'mood' => 'jovial',
            'height' => '8 feet',
            'languages spoken' => 'Swahili, English, Luyha'
        ],
        'last_seen' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'last_seen_place' => $faker->streetName,
        'last_seen_with' => array('Lyna', 'Doti'),
    ];

});

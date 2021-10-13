<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Enrollment::class, function (Faker $faker) {
    $phone = '696736728';
    return [
        'year'=>$faker->text(10),
        'major'=>$faker->name,
        'roll_no'=>$faker->ipv4,
        'photo'=>$faker->imageUrl(),
        'stipend'=>rand(0,1),
        'boudoir'=>rand(0,1),
        'current_address'=>$faker->address,
        'current_phone'=>$phone . rand(1, 10)
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\ExamRecord::class, function (Faker $faker) {
    return [
        'exam'=>rand(1,5),
        'major'=>$faker->city,
        'roll_no'=>$faker->ipv4,
        'year'=>$faker->year,
        'status'=>rand(0,1),

    ];
});

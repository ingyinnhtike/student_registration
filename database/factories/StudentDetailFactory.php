<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\StudentDetail::class, function (Faker $faker) {
    $phone = '696736728';
    return [
        'name_mm'=>$faker->name,
        'name_eng'=>$faker->name,
        'race'=>$faker->name,
        'religion'=>$faker->name,
        'township'=>$faker->city,
        'state'=>rand(1,15),
        'nrc'=>$faker->text(30),
        'dob'=>$faker->date('Y-m-d','now'),
        'high_school_roll_no'=>$faker->ipv4,
        'high_school_year'=>$faker->year,
        'high_school_exam_location'=>$faker->city,
        'university_roll_no'=>$faker->ipv6,
        'university_start_year'=>$faker->year.'-'.$faker->year,
        'gender'=>rand(0,1),
        'permanent_address'=>$faker->address,
        'permanent_phone'=>$phone.rand(1,10),
    ];
});

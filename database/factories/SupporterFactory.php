<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model\Supporter::class, function (Faker $faker) {
    $phone = '696736728';
    return [
        'name'=>$faker->name,
        'relationship_to_user'=>$faker->text('12'),
        'work' => $faker->text(20),
        'address' => $faker->address,
        'phone' => $phone . rand(1, 10),
    ];
});

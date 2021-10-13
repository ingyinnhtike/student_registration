<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\ParentDetail::class, function (Faker $faker) {
    $phone = '696736728';
    $availability = rand(0,2);
    if($availability === 0){
        return [
            'availability'=>$availability,
            'relationship_to_user' => rand(0, 1),
        ];
    }else {
        return [
            'name_mm' => $faker->name,
            'name_eng' => $faker->name,
            'race' => $faker->name,
            'religion' => $faker->name,
            'township' => $faker->city,
            'state' => rand(1, 15),
            'nrc' => $faker->text(30),
            'nrc2' => $faker->text(30),
            'address' => $faker->address,
            'phone' => $phone . rand(1, 10),
            'relationship_to_user' => rand(0, 1),
            'work' => $faker->text(20),
            'availability'=>$availability,
        ];
    }
});

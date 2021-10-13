<?php

use Illuminate\Database\Seeder;

class StudentDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::all()->each(function ($user){
            $user->studentDetails()->save(factory(\App\Models\StudentDetail::class)->make());
        });
    }
}

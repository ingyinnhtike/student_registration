<?php

use Illuminate\Database\Seeder;

class ExamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::all()->each(function ($user){
            $user->exams()->saveMany(factory(\App\Models\ExamRecord::class,rand(0,10))->make());
        });
    }
}

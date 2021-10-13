<?php

use Illuminate\Database\Seeder;

class SupporterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::all()->each(function ($user){
           $user->supporters()->save(factory(\App\Model\Supporter::class)->make());
        });
    }
}

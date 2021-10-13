<?php

use Illuminate\Database\Seeder;

class ParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::all()->each(function ($user){
           $user->parents()->saveMany(factory(\App\Models\ParentDetail::class,rand(1,2))->make());
        });
    }
}

<?php

use Illuminate\Database\Seeder;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::all()->each(function ($user){
            $form = $user->enrollments()->save(factory(\App\Models\Enrollment::class)->make());
            $form->acceptance()->save(new \App\Models\Acceptance());
        });
    }
}

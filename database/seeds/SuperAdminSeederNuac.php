<?php

use Illuminate\Database\Seeder;

class SuperAdminSeederNuac extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@blueplanet.com.mm',
            'password' => \Illuminate\Support\Facades\Hash::make('@dm!n2468'),
        ]);

        $user->assignRole('Super Admin');

        $user = \App\User::create([
            'name' => 'Student Affair',
            'email' => 'nuacstudentaffair@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('student@ffair!234'),
        ]);

        $user->assignRole('Student Affair');

        $user = \App\User::create([
            'name' => 'Finance',
            'email' => 'nuacfinance@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('fin@nce!234'),
        ]);

        $user->assignRole('Finance');
    }
}

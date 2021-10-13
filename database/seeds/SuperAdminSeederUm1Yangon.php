<?php

use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'name' => 'UM1 Super Admin',
            'email' => 'um1superadmin@blueplanet.com.mm',
            'password' => \Illuminate\Support\Facades\Hash::make('admin@stureg!@#123'),
        ]);

        $user->assignRole('Super Admin');

        $user = \App\User::create([
            'name' => 'Student Affair 1',
            'email' => 'um1yangonstudentaffair1@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('admin@um1yangon1'),
        ]);

        $user->assignRole('Student Affair');

        $user = \App\User::create([
            'name' => 'Finance 1',
            'email' => 'um1yangonfinance1@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('finance@um1yangon1'),
        ]);

        $user->assignRole('Finance');
    }
}

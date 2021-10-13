<?php

use Illuminate\Database\Seeder;

class SuperAdminSeederDagon extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'name' => 'Dagon Super Admin',
            'email' => 'dagonsuperadmin@blueplanet.com.mm',
            'password' => \Illuminate\Support\Facades\Hash::make('@dm!n2468D@g0n'),
        ]);

        $user->assignRole('Super Admin');

        $user = \App\User::create([
            'name' => 'Dagon Student Affair',
            'email' => 'dagonstudentaffair@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('student@ffair!D@g0n'),
        ]);

        $user->assignRole('Student Affair');

        $user = \App\User::create([
            'name' => 'Dagon Finance',
            'email' => 'dagonfinance@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('fin@nce!D@g0n'),
        ]);

        $user->assignRole('Finance');
    }
}

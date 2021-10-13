<?php

use Illuminate\Database\Seeder;

class SuperAdminSeederMTU extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'name' => 'MTU Super Admin',
            'email' => 'mtusuperadmin@blueplanet.com.mm',
            'password' => \Illuminate\Support\Facades\Hash::make('@dm!n1357MtU'),
        ]);

        $user->assignRole('Super Admin');

        $user = \App\User::create([
            'name' => 'MTU Student Affair',
            'email' => 'mtustudentaffair@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('student@ffair!MtU'),
        ]);

        $user->assignRole('Student Affair');

        $user->assignRole('Student Affair');

        $user = \App\User::create([
            'name' => 'MTU Finance',
            'email' => 'mtufinance@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('fin@nce!MtU'),
        ]);

        $user->assignRole('Finance');
    }
}

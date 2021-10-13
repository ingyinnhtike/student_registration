<?php

use Illuminate\Database\Seeder;

class SuperAdminSeederSample extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $user = \App\User::create([
            'name' => 'Sample Uni Admin',
            'email' => 'superadmin@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('samp1eAdm1n'),
        ]);

        $user->assignRole('Super Admin');

        $user = \App\User::create([
            'name' => 'Student Affair',
            'email' => 'studentaffair@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('student@ffairAdm1n'),
        ]);

        $user->assignRole('Student Affair');

        $user = \App\User::create([
            'name' => 'Finance',
            'email' => 'finance@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('fin@nceAdm1n'),
        ]);

        $user->assignRole('Finance');
    }
}

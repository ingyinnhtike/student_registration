<?php

use Illuminate\Database\Seeder;

class SuperAdminSeederGTI extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'name' => 'GTI Super Admin',
            'email' => 'gtisuperadmin@blueplanet.com.mm',
            'password' => \Illuminate\Support\Facades\Hash::make('@dm!n1357gT!'),
        ]);

        $user->assignRole('Super Admin');

        $user = \App\User::create([
            'name' => 'GTI Student Affair',
            'email' => 'gtistudentaffair@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('student@ffair!gT!'),
        ]);

        $user->assignRole('Student Affair');

        $user = \App\User::create([
            'name' => 'GTI Finance',
            'email' => 'gtifinance@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('fin@nce!gT!'),
        ]);

        $user->assignRole('Finance');
    }
}

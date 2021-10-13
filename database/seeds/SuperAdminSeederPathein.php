<?php

use Illuminate\Database\Seeder;

class SuperAdminSeederPathein extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'name' => 'Pathein University Super Admin',
            'email' => 'patheinsuperadmin@blueplanet.com.mm',
            'password' => \Illuminate\Support\Facades\Hash::make('@dm!n1357pathein'),
        ]);

        $user->assignRole('Super Admin');

        $user = \App\User::create([
            'name' => 'BOOM Super Admin',
            'email' => 'boomsuperadmin@blueplanet.com.mm',
            'password' => \Illuminate\Support\Facades\Hash::make('b00msup3r@dm1n'),
        ]);

        $user->assignRole('Super Admin');

        $user = \App\User::create([
            'name' => 'UDE Super Admin',
            'email' => 'patheinudesuperadmin@blueplanet.com.mm',
            'password' => \Illuminate\Support\Facades\Hash::make('@dm!n1357patheinude'),
        ]);

        $user->assignRole('Super Admin');

        $user = \App\User::create([
            'name' => 'Pathein University Student Affair',
            'email' => 'patheinstudentaffair@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('student@ffair!pathein'),
        ]);

        $user->assignRole('Student Affair');

        $user = \App\User::create([
            'name' => 'Pathein University Finance',
            'email' => 'patheinfinance@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('fin@nce!pathein'),
        ]);
        
        $user->assignRole('Finance');

    }
}

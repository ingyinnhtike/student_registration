<?php

use Illuminate\Database\Seeder;

class SuperAdminSeederMLM extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'name' => 'MLMU Super Admin',
            'email' => 'mlmusuperadmin@blueplanet.com.mm',
            'password' => \Illuminate\Support\Facades\Hash::make('@dm!n1357mlm'),
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
            'email' => 'mlmudesuperadmin@blueplanet.com.mm',
            'password' => \Illuminate\Support\Facades\Hash::make('@dm!n1357mlmude'),
        ]);

        $user->assignRole('Super Admin');

        $user = \App\User::create([
            'name' => 'MLMU Student Affair',
            'email' => 'mlmustudentaffair@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('student@ffair!mlm'),
        ]);

        $user->assignRole('Student Affair');

        $user = \App\User::create([
            'name' => 'MLMU Finance',
            'email' => 'mlmufinance@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('fin@nce!mlm'),
        ]);
        
        $user->assignRole('Finance');

    }
}

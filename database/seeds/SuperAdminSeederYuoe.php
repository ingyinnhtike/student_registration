<?php

use Illuminate\Database\Seeder;

class SuperAdminSeederYuoe extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'name' => 'YUOE Super Admin',
            'email' => 'yuoesuperadmin@blueplanet.com.mm',
            'password' => \Illuminate\Support\Facades\Hash::make('@dm!n2468Yu0e'),
        ]);

        $user->assignRole('Super Admin');

        $user = \App\User::create([
            'name' => 'YUOE Student Affair',
            'email' => 'yuoestudentaffair@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('student@ffair!Yu0e'),
        ]);

        $user->assignRole('Student Affair');

        $user = \App\User::create([
            'name' => 'YUOE Finance',
            'email' => 'yuoefinance@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('fin@nce!Yu0e'),
        ]);

        $user->assignRole('Finance');
    }
}

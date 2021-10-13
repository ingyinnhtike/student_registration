<?php

use Illuminate\Database\Seeder;

class SuperAdminSeederTTU extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'name' => 'TTU Super Admin',
            'email' => 'ttusuperadmin@blueplanet.com.mm',
            'password' => \Illuminate\Support\Facades\Hash::make('@dm!n2468TtU'),
        ]);

        $user->assignRole('Super Admin');

        $user = \App\User::create([
            'name' => 'TTU Student Affair',
            'email' => 'ttustudentaffair@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('student@ffair!TtU'),
        ]);

        $user->assignRole('Student Affair');

        //9 student affair
        $user->assignRole('Student Affair');
        $user = \App\User::create([
            'name' => 'TTU Architecture Student Affair',
            'email' => 'ttuarchitecturestudentaffair@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('student@ffair!TtUaRchitecture'),
        ]);

        $user->assignRole('Student Affair');
        $user = \App\User::create([
            'name' => 'TTU Civil Student Affair',
            'email' => 'ttucivilstudentaffair@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('student@ffair!TtUcIvil'),
        ]);

        $user->assignRole('Student Affair');
        $user = \App\User::create([
            'name' => 'TTU Chemical Student Affair',
            'email' => 'ttuchemicalstudentaffair@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('student@ffair!TtUChemical'),
        ]);

        $user->assignRole('Student Affair');
        $user = \App\User::create([
            'name' => 'TTU Electrical Power Student Affair',
            'email' => 'ttuelectricalpowerstudentaffair@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('student@ffair!TtUelEctricalpower'),
        ]);

        $user->assignRole('Student Affair');
        $user = \App\User::create([
            'name' => 'TTU Electronic Engineering Student Affair',
            'email' => 'ttuelectronicengineeringstudentaffair@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('student@ffair!TtUeLectronicengineering'),
        ]);

        $user->assignRole('Student Affair');
        $user = \App\User::create([
            'name' => 'TTU Information Technology Student Affair',
            'email' => 'ttuinformationtechnologystudentaffair@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('student@ffair!TtUiNformationtechnology'),
        ]);

        $user->assignRole('Student Affair');
        $user = \App\User::create([
            'name' => 'TTU Mechanical Engineering Student Affair',
            'email' => 'ttumechanicalengineeringstudentaffair@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('student@ffair!TtUmEchanicalengineering'),
        ]);

        $user->assignRole('Student Affair');
        $user = \App\User::create([
            'name' => 'TTU Mechatronic Engineering Student Affair',
            'email' => 'ttumechatronicengineeringstudentaffair@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('student@ffair!TtUmEchatronicengineering'),
        ]);

        $user->assignRole('Student Affair');

        $user = \App\User::create([
            'name' => 'TTU Petroleum Engineering Student Affair',
            'email' => 'ttupetroleumengineeringstudentaffair@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('student@ffair!TtUpEtroleumengineering'),
        ]);

        $user->assignRole('Student Affair');

        $user = \App\User::create([
            'name' => 'TTU Finance',
            'email' => 'ttufinance@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('fin@nce!TtU'),
        ]);

        $user->assignRole('Finance');
    }
}

<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \Spatie\Permission\Models\Role::create(['name' => 'Student']);
        \Spatie\Permission\Models\Role::create(['name' => 'Student Affair']);
        \Spatie\Permission\Models\Role::create(['name' => 'Finance']);
        \Spatie\Permission\Models\Role::create(['name' => 'Super Admin']);

    }
}

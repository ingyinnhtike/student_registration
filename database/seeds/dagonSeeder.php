<?php

use Illuminate\Database\Seeder;

class dagonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SuperAdminSeederDagon::class);
        $this->call(TestFormSeeder::class);
    }
}

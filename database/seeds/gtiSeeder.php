<?php

use Illuminate\Database\Seeder;

class gtiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SuperAdminSeederGTI::class);
        $this->call(GtiFormSeeder::class);
    }
}

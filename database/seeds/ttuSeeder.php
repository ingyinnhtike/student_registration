<?php

use Illuminate\Database\Seeder;

class ttuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SuperAdminSeederTTU::class);
        $this->call(TestFormSeeder::class);
    }
}

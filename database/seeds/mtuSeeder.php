<?php

use Illuminate\Database\Seeder;

class mtuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SuperAdminSeederMTU::class);
        $this->call(TestFormSeeder::class);
    }
}

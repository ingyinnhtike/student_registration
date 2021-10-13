<?php

use Illuminate\Database\Seeder;

class sampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->call(SuperAdminSeederSample::class);
        $this->call(TestFormSeeder::class);
    }
}

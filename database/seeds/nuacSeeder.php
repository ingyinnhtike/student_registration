<?php

use Illuminate\Database\Seeder;

class nuacSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SuperAdminSeederNuac::class);
        $this->call(TestFormSeeder::class);

    }
}

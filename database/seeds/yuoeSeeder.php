<?php

use Illuminate\Database\Seeder;

class yuoeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SuperAdminSeederYuoe::class);
        $this->call(TestFormSeeder::class);
    }
}

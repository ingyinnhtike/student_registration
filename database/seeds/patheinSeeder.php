<?php

use Illuminate\Database\Seeder;

class patheinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SuperAdminSeederPathein::class);
        $this->call(TestFormSeeder::class);

    }
}

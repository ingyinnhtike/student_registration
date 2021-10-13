<?php

use Illuminate\Database\Seeder;

class GtiFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FormTypeSeeder::class);
        $this->call(FeeSeeder::class);
        $this->call(GtiFeeSeeder::class);
        $this->call(GtiCourseFeeSeeder::class);

    }
}

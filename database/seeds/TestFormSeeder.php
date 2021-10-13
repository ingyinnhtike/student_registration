<?php

use Illuminate\Database\Seeder;

class TestFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FeeSeeder::class);
        $this->call(FormTypeSeeder::class);
        $this->call(FineSeeder::class);
        $this->call(TestCourseFeeSeeder::class);
        //$this->call(TestUserFineSeeder::class);
    }
}

<?php

use Illuminate\Database\Seeder;

class YuoeFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(YuoeFeeSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(YuoeCourseFeeSeeder::class);
    }
}

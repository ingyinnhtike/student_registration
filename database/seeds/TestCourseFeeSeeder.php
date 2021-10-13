<?php

use Illuminate\Database\Seeder;

class TestCourseFeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $courses = \App\Models\Course::all();
        $fees = \App\Models\Fee::all();
        $this->command->getOutput()->progressStart($courses->count());
        foreach ($courses as $course) {
            foreach ($fees as $fee) {
                $course->fees()->attach($fee, ['amount' => rand(1, 60) * 500]);
            }
            $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();

    }
}

<?php

use Illuminate\Database\Seeder;

class YuoeCourseSeeder extends Seeder
{
    use CommandOutput;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(YuoeMajorSeeder::class);
        $years = \App\Models\Year::all();
        $majors = \App\Models\Major::all();
        $this->showFeedback('Creating Courses');
        $this->progressStart($years->count());
        foreach ($years as $year) {
            $year->majors()->attach($majors->pluck('id'));
            $this->progressAdvance();
        }
        $this->progressFinish();
    }
}

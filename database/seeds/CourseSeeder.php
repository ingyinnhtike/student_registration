<?php

use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    use CommandOutput;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $years = get_config('form-setting.years_to_seed');
        $majors = get_config('form-setting.majors_to_seed');

        $this->showFeedback("Inserting Years");
        $this->progressStart(count($years));
        foreach ($years as $year) {
            \App\Models\Year::create($year);
            $this->progressAdvance();
        }
        $this->progressFinish();
        $site = config('common.site');
        if ($site === 'yuoe') {
            $this->call(YuoeCourseSeeder::class);
            return;
        }

        $this->showFeedback("Inserting majors");
        $this->progressStart(count($majors));

        $years = \App\Models\Year::all();
        foreach ($majors as $major) {
            $major = \App\Models\Major::create($major);
            $major->years()->sync($years);
            $this->progressAdvance();
        }
        $this->progressFinish();


    }
}

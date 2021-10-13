<?php

use Illuminate\Database\Seeder;

class YuoeCourseFeeSeeder extends Seeder
{
    use CourseFee;

    public function run()
    {
        //first delete unnecessary courses
        //$this->deleteUnnecessaryCourses();
        $this->assignCourseAndFee();

    }

    function getCourseFee(): array
    {
        return [
            'ပထမနှစ်' => [
                [
                    'name' => 'မှတ်ပုံတင်ကြေး',
                    'amount' => 100,
                ],
                [
                    'name' => 'ကျောင်းဝင်ကြေး',
                    'amount' => 100,
                ],
                [
                    'name' => 'ကျောင်းလခ',
                    'amount' => 6000,
                ],
                [
                    'name' => 'ဓာတ်ခွဲခန်းကြေး',
                    'amount' => 900,
                ],

                [
                    'name' => 'စာမေးပွဲကြေး',
                    'amount' => 300,
                ],
                [
                    'name' => 'စာကြည့်တိုက်ကြေး',
                    'amount' => 300,
                ],
                [
                    'name' => 'အားကစားကြေး',
                    'amount' => 100,
                ],
                [
                    'name' => 'မဂ္ဂဇင်းကြေး',
                    'amount' => 2500,
                ],
            ],
            'all' => [

                [
                    'name' => 'ကျောင်းလခ',
                    'amount' => 6000,
                ],
                [
                    'name' => 'ဓာတ်ခွဲခန်းကြေး',
                    'amount' => 900,
                ],

                [
                    'name' => 'စာမေးပွဲကြေး',
                    'amount' => 300,
                ],
                [
                    'name' => 'စာကြည့်တိုက်ကြေး',
                    'amount' => 300,
                ],
                [
                    'name' => 'အားကစားကြေး',
                    'amount' => 100,
                ],
                [
                    'name' => 'မဂ္ဂဇင်းကြေး',
                    'amount' => 2500,
                ],
            ],
        ];
    }


    public function deleteUnnecessaryCourses(): void
    {
        $years = \App\Models\Year::query()->whereIn('name_en', ['First Year', 'Second Year'])->get();
        $majors = \App\Models\Major::query()
            ->where('name_en', 'like', 'Myanmar%')
            ->orWhere('name_en', 'like', 'English%')
            ->orWhere('name_en', 'like', 'Mathematics%')
            ->orWhere('name_en', 'like', 'PE%')
            ->get();
        \App\Models\Course::query()
            ->whereIn('year_id', $years->pluck('id'))
            ->whereIn('major_id', $majors->pluck('id'))
            ->delete();


        $years = \App\Models\Year::query()->whereIn('name_en', ['Third Year', 'Fourth Year', 'Fifth Year'])->get();
        $majors = \App\Models\Major::query()
            ->where('name_en', 'not like', 'Myanmar%')
            ->where('name_en', 'not like', 'English%')
            ->where('name_en', 'not like', 'Mathematics%')
            ->where('name_en', 'not like', 'PE%')
            ->get();
        \App\Models\Course::query()
            ->whereIn('year_id', $years->pluck('id'))
            ->whereIn('major_id', $majors->pluck('id'))
            ->delete();

    }
}

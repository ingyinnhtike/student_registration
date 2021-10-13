<?php

use Illuminate\Database\Seeder;

class GtiCourseFeeSeeder extends Seeder
{
    use CourseFee;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->assignCourseAndFee();
    }

    function getCourseFee()
    {
        return [
            'ပထမနှစ်(ညနေပိုင်းသင်တန်း)' => [
                [
                    'name' => 'ကျောင်းလခ',
                    'amount' => 140000,
                ],
                [
                    'name' => 'မှတ်ပုံတင်ကြေး',
                    'amount' => 200,
                ],
                [
                    'name' => 'စာမေးပွဲကြေး',
                    'amount' => 2500,
                ],
                [
                    'name' => 'အလုပ်ရုံနှင့်ဓါတ််ခွဲခန်းကြေး',
                    'amount' => 500,
                ],
                [
                    'name' => 'စာကြည့်တိုက်ကြေး',
                    'amount' => 300,
                ],
                [
                    'name' => 'အားကစားကြေး',
                    'amount' => 1000,
                ],
            ],
            'ဒုတိယနှစ်(ညနေပိုင်းသင်တန်း)' => [
                [
                    'name' => 'ကျောင်းလခ',
                    'amount' => 140000,
                ],
                [
                    'name' => 'မှတ်ပုံတင်ကြေး',
                    'amount' => 200,
                ],
                [
                    'name' => 'စာမေးပွဲကြေး',
                    'amount' => 2500,
                ],
                [
                    'name' => 'အလုပ်ရုံနှင့်ဓါတ််ခွဲခန်းကြေး',
                    'amount' => 500,
                ],
                [
                    'name' => 'စာကြည့်တိုက်ကြေး',
                    'amount' => 300,
                ],
                [
                    'name' => 'အားကစားကြေး',
                    'amount' => 1000,
                ],
            ],
            'တတိယနှစ်(ညနေပိုင်းသင်တန်း)' => [
                [
                    'name' => 'ကျောင်းလခ',
                    'amount' => 140000,
                ],
                [
                    'name' => 'မှတ်ပုံတင်ကြေး',
                    'amount' => 200,
                ],
                [
                    'name' => 'စာမေးပွဲကြေး',
                    'amount' => 2500,
                ],
                [
                    'name' => 'အလုပ်ရုံနှင့်ဓါတ််ခွဲခန်းကြေး',
                    'amount' => 500,
                ],
                [
                    'name' => 'စာကြည့်တိုက်ကြေး',
                    'amount' => 300,
                ],
                [
                    'name' => 'အားကစားကြေး',
                    'amount' => 1000,
                ],
            ],
            'all' => [
                [
                    'name' => 'ကျောင်းလခ',
                    'amount' => 10000,
                ],
                [
                    'name' => 'မှတ်ပုံတင်ကြေး',
                    'amount' => 200,
                ],
                [
                    'name' => 'စာမေးပွဲကြေး',
                    'amount' => 2500,
                ],
                [
                    'name' => 'အလုပ်ရုံနှင့်ဓါတ််ခွဲခန်းကြေး',
                    'amount' => 500,
                ],
                [
                    'name' => 'စာကြည့်တိုက်ကြေး',
                    'amount' => 300,
                ],
                [
                    'name' => 'အားကစားကြေး',
                    'amount' => 1000,
                ],
            ],
        ];
    }

}

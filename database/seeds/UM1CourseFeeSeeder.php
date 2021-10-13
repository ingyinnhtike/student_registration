<?php

use Illuminate\Database\Seeder;

class UM1CourseFeeSeeder extends Seeder
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

    function getCourseFee(): array
    {
        return [
            'all' => [
                [
                    'name' => 'ကျောင်းဝင်ကြေး',
                    'amount' => 1000,
                ],
                [
                    'name' => 'မှတ်ပုံတင်ကြေး',
                    'amount' => 1000,
                ],
                [
                    'name' => 'ကျောင်းလခ',
                    'amount' => 9600,
                ],
                [
                    'name' => 'က-ပ-မ ကြေး',
                    'amount' => 200,
                ],
                [
                    'name' => 'ဓာတ်ခွဲခန်းကြေး',
                    'amount' => 2000,
                ],
                [
                    'name' => 'မဂ္ဂဇင်းကြေး၊ အားကစားကြေး၊ အနုပညာအသင်းကြေး',
                    'amount' => 6000,
                ],
            ]
        ];
    }


}

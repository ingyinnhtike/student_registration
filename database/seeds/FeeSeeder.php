<?php

use Illuminate\Database\Seeder;

class FeeSeeder extends Seeder
{
    private $fee_types = [
        [
            'name' => 'ကျောင်းဝင်ကြေး',
            'name_en' => 'Entrance Fee',
        ],
        [
            'name' => 'မှတ်ပုံတင်ကြေး',
            'name_en' => 'Registration Fee',
        ],
        [
            'name' => 'ကျောင်းလခ',
            'name_en' => 'School Fee',
        ],
        [
            'name' => 'က-ပ-မ ကြေး',
            'name_en' => 'က-ပ-မ ကြေး',
        ],
        [
            'name' => 'ဓာတ်ခွဲခန်းကြေး',
            'name_en' => 'Laboratory Fee',
        ],


        [
            'name' => 'မဂ္ဂဇင်းကြေး',
            'name_en' => 'Magazine Fee',
        ],
        [
            'name' => 'အားကစားကြေး',
            'name_en' => 'Sport Fee',
        ],
        [
            'name' => 'အနုပညာအသင်းကြေး',
            'name_en' => 'Art club Fee',
        ],

        [
            'name' => 'စာမေးပွဲကြေး',
            'name_en' => 'Exam Fee',
        ],
        [
            'name' => 'အောင်လက်မှတ်ကြေး',
            'name_en' => 'Certificate Fee',
        ],
        [
            'name' => 'အထွေထွေ',
            'name_en' => 'General',
        ],
        [
            'name' => 'အလွတ်မှတ်ပုံတင်ကြေး',
            'name_en' => 'Plain Registration Fee',
        ],
        [
            'name' => 'မှတ်ပုံတင်ကတ်ပြား',
            'name_en' => 'Id Card',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->fee_types as $fee_type) {
            \App\Models\Fee::create($fee_type);
        }

    }
}

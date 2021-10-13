<?php

use Illuminate\Database\Seeder;

class GtiFeeSeeder extends Seeder
{

    private $fee_types = [
        [
            'name' => 'စာကြည့်တိုက်ကြေး',
            'name_en' => 'Library Fee',
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

        $fee = \App\Models\Fee::where('name_en','Laboratory Fee')->first();
        $fee->name = 'အလုပ်ရုံနှင့်ဓါတ််ခွဲခန်းကြေး';
        $fee->name_en = 'Workshop and Laboratory Fee';
        $fee->save();
    }
}

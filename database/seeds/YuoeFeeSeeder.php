<?php

use Illuminate\Database\Seeder;

class YuoeFeeSeeder extends Seeder
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
    }
}

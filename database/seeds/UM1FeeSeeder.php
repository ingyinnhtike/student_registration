<?php

use Illuminate\Database\Seeder;

class UM1FeeSeeder extends Seeder
{
    private $fee_types = [
        [
            'name' => 'မဂ္ဂဇင်းကြေး၊ အားကစားကြေး၊ အနုပညာအသင်းကြေး',
            'name_en' => 'Magazine Fee, Sport Fee, Art club Fee',
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

<?php

use Illuminate\Database\Seeder;

class FineSeeder extends Seeder
{
    private $fines = [
        [
            'name' => 'Ferry Debt',
            'description' => 'Remaining Debt for ferry',
        ],
        [
            'name' => 'Boudoir Debt',
            'description' => 'Remaining Debt for boudoir',
        ],
        [
            'name' => 'Exam Fine',
            'description' => 'Fine for late exam.',
        ], [
            'name' => 'Exam debt',
            'description' => 'Remaining Debt for exam',
        ],

    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->fines as $fine) {
            \App\Models\Fine::create($fine);
        }
    }
}

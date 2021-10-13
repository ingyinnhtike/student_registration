<?php

use Illuminate\Database\Seeder;

class FormTypeSeeder extends Seeder
{
    private $form_types = [
        [
            'name' => 'Student Registration',
            'description' => 'Student Registration'
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->form_types as $form_type) {
            \App\Models\FormType::create($form_type);
        }
    }
}

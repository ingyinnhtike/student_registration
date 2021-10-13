<?php

use Illuminate\Database\Seeder;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->call(FeeSeeder::class);
        $this->call(FormTypeSeeder::class);
        $this->call(FineSeeder::class);
    }
}

<?php

use Illuminate\Database\Seeder;

class UM1FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FormTypeSeeder::class);

        $this->call(FeeSeeder::class);
        $this->call(UM1FeeSeeder::class);
        $this->call(UM1CourseFeeSeeder::class);

//        $this->call(FineSeeder::class);

    }
}

<?php

use Illuminate\Database\Seeder;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(StudentDetailSeeder::class);
        $this->call(ParentSeeder::class);
        $this->call(ExamsSeeder::class);
        $this->call(SupporterSeeder::class);
        $this->call(EnrollmentSeeder::class);
    }
}

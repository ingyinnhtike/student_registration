<?php

use Illuminate\Database\Seeder;

class mawlamyineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SuperAdminSeederMLM::class);
        $this->call(TestFormSeeder::class);

    }
}

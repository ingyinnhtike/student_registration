<?php

use App\Models\NrcStateNumber;
use App\Models\NrcTownship;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleAndPermissionSeeder::class);
        $this->call(TownshipSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(nrcStateNoSeeder::class);
        $this->call(nrcTownshipsSeeder::class);

        $siteName = config('common.site');
        $seederName = $siteName . 'Seeder';
        $this->call($seederName);
    }
}

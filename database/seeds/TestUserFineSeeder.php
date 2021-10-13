<?php

use Illuminate\Database\Seeder;

class TestUserFineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\User::whereNull('email')
            ->limit(10)
            ->get();

        $fines = \App\Models\Fine::all();
        $admins = \App\User::whereNotNull('email')
            ->get();

        foreach ($users as $user) {
            $rand_fines = $fines->random(rand(0, $fines->count()));
            foreach ($rand_fines as $rand_fine) {
                $user->fines()->attach($rand_fine, [
                    'issued_user_id' => $admins->random(1)->first()->id,
                    'amount' => rand(1, 10) * 1000,
                ]);
            }
        }
    }
}

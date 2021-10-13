<?php

use Illuminate\Database\Seeder;

class TownshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = config('township.townships');
        $this->command->getOutput()->progressStart(count($states));
        foreach ($states as $state_name => $state_data) {
            $state = \App\State::create([
                'name' => $state_name,
                'name_eng' => $state_data['name_eng']
            ]);

            $this->command->getOutput()->progressAdvance();

            foreach ($state_data['districts'] as $district_name => $district_data) {
                $district = $state->districts()->create([
                    'name' => $district_name,
                    'name_eng' => $district_data['name_eng']
                ]);

                foreach ($district_data['townships'] as $township) {
                    $township = $district->townships()->create([
                        'name' => $township,
                    ]);
                }
            }
        }

        $this->command->getOutput()->progressFinish();
    }
}

<?php

use Illuminate\Database\Seeder;

class nrcStateNoSeeder extends Seeder
{
    use CommandOutput;
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $states = [
        '၁' => 'ကချင်ပြည်နယ်', '၂' => 'ကယားပြည်နယ်', '၃' => 'ကရင်ပြည်နယ်', '၄' => 'ချင်းပြည်နယ်',
        '၅' => 'စစ်ကိုင်းတိုင်းဒေသကြီး', '၆' => 'တနင်္သာရီတိုင်းဒေသကြီး', '၇' => 'ပဲခူးတိုင်းဒေသကြီး', '၈' => 'မကွေးတိုင်းဒေသကြီး',
        '၉' => 'မန္တလေးတိုင်းဒေသကြီး', '၁၀' => 'မွန်ပြည်နယ်', '၁၁' => 'ရခိုင်ပြည်နယ်', '၁၂' => 'ရန်ကုန်တိုင်းဒေသကြီး',
        '၁၃' => 'ရှမ်းပြည်နယ်', '၁၄' => 'ဧရာဝတီတိုင်းဒေသကြီး'
    ];

    public function run()
    {
        $this->showFeedback("Seeding States' numbers and names.");
        $this->progressStart(count($this->states));
        foreach ($this->states as $state_number => $state_name) {
            \Illuminate\Support\Facades\DB::table('nrc_state_numbers')->insert([
                'state_no' => $state_number,
                'state_name' => $state_name,
                'created_at' => \Carbon\Carbon::now()
            ]);
            $this->progressAdvance();
        }
        $this->progressFinish();

    }
}



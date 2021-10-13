<?php

use Illuminate\Database\Seeder;

class YuoeMajorSeeder extends Seeder
{
    use CommandOutput;
    private $majors = [
        ['name_en' => 'Myanmar', 'name' => 'မြန်မာစာ', 'key' => 'Myan'],
        ['name_en' => 'English', 'name' => 'အင်္ဂလိပ်စာ', 'key' => 'Eng(ELT/ELP)'],
        ['name_en' => 'Mathematics', 'name' => 'သင်္ချာ', 'key' => 'Math'],
        ['name_en' => 'Chemistry', 'name' => 'ဓာတုဗေဒ', 'key' => 'chemistry'],
        ['name_en' => 'Physics', 'name' => 'ရူပဗေဒ', 'key' => 'physics'],
        ['name_en' => 'Biology', 'name' => 'ဇီဝဗေဒ', 'key' => 'bio'],
        ['name_en' => 'Geography', 'name' => 'ပထဝီဝင်', 'key' => 'geology'],
        ['name_en' => 'History', 'name' => 'သမိုင်း', 'key' => 'history'],
        ['name_en' => 'Ecology', 'name' => 'ဘောဂဗေဒ', 'key' => 'ecology'],
        ['name_en' => 'PE', 'name' => 'ကာယ', 'key' => 'PE'],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $majors = $this->majors;

        $this->createTwoGroupMajors($majors);

        $this->createThreeGroupMajors();

        $this->createOneGroupMajors($majors);
    }

    private function createOneGroupMajors($majors)
    {
        foreach ($majors as $major) {
            $this->createMajor(
                $major['name_en'] . '',
                $major['name'] . '',
                $major['key'] . ''
            );
        }
    }

    private function createTwoGroupMajors($majors)
    {
        $this->showFeedback('Inserting majors combined by two majors');
        $this->progressStart(count($majors));

        foreach ($majors as $major) {

            $this->progressAdvance();

            foreach ($majors as $associated_major) {
                if ($major !== $associated_major) {
                    $this->createMajor(
                        $major['name_en'] . ', ' . $associated_major['name_en'],
                        $major['name'] . ', ' . $associated_major['name'],
                        $major['key'] . ', ' . $associated_major['key']);
                }
            }
        }

        $this->progressFinish();
    }

    private function createThreeGroupMajors()
    {
        $this->showFeedback('Inserting majors combined by three majors');

        $two_groups_majors = \App\Models\Major::all();

        $this->progressStart($two_groups_majors->count());
        foreach ($two_groups_majors as $index => $two_groups_major) {
            $this->progressAdvance();
            foreach ($this->majors as $major) {
                if (!\Illuminate\Support\Str::contains($two_groups_major->name_en, $major['name_en'])) {
                    $this->createMajor(
                        $two_groups_major->name_en . ', ' . $major['name_en'],
                        $two_groups_major->name . ', ' . $major['name'],
                        $two_groups_major->key . ', ' . $major['key']
                    );
                }
            }
        }
        $this->progressFinish();
    }


    private function createMajor($name_en, $name, $key)
    {
        return \App\Models\Major::create([
            'name_en' => $name_en,
            'name' => $name,
            'key' => $key
        ]);
    }
}

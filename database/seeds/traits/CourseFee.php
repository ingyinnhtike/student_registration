<?php


trait CourseFee
{
    use CommandOutput;

    abstract function getCourseFee(): array;

    public function assignCourseAndFee()
    {
        $course_fee = $this->getCourseFee();

        foreach ($course_fee as $course => $fees) {

            if ($course === 'all') {
                $courses = \App\Models\Course::doesntHave('fees')->get();
            } else {
                $year_id = \App\Models\Year::where('name', $course)->first()->id;
                $courses = \App\Models\Course::where('year_id', $year_id)->get();
            }
            $total_courses = $courses->count();
            $this->showFeedback("Inserting fees for ($course) course(s), total course: $total_courses");

            $this->progressStart($courses->count());
            foreach ($courses as $index => $course) {

                $fees_and_amount = [];
                foreach ($fees as $fee) {

                    $feeId = \App\Models\Fee::where('name', $fee['name'])->first()->id;
                    $fees_and_amount["$feeId"] = ['amount' => $fee['amount']];
                }
                $course->fees()->attach($fees_and_amount);
                $this->progressAdvance();

            }
            $this->progressFinish();;

        }
    }
}

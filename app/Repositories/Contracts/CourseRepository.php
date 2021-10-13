<?php

namespace App\Repositories\Contracts;


use App\Models\AppliedCourse;

interface CourseRepository
{
    public function search($q, $sort = 'year');

    public function addFee($data);

    public function findCourseFee($course_fee_id, $columns);

    public function destroyCourseFee($course_fee_id);

    public function updateFee($data);

    function studentsReport($major_ids = null, $year_ids = null);

    function paymentReport();
}

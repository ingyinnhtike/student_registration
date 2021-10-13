<?php


namespace App\Repositories\Contracts;



interface AppliedCourseRepository
{
    public function findAppliedCourse($major, $year, $type = '');
}

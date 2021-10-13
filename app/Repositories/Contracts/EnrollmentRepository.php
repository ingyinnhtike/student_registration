<?php


namespace App\Repositories\Contracts;


use App\Models\Enrollment;

interface EnrollmentRepository extends BaseRepository
{
    public function findOrFail($id):Enrollment;
}

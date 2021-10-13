<?php


namespace App\Repositories;

use App\Models\StudentDetail;
use App\Repositories\Contracts\StudentDetailRepository;
use App\Repositories\Traits\HasAdditionalFields;

class StudentDetailRepositoryImpl extends BaseRepositoryImpl implements StudentDetailRepository
{
    protected $required_fields = [
        'name_mm',
        'name_eng',
        'race',
        'religion',
        'nrc',
        'nrc2',
        'dob',
        'university_start_year',
        'gender',
        'permanent_address',
        'permanent_phone',
    ];

    protected $additional_fields = [
        'nrc_issue_date',
        'blood_type',
        'boudoir_no',
        'boudoir_name',
        'boudoir_room_no',
        'district',
        'work',
    ];

    function model(): string
    {
        return StudentDetail::class;
    }

    function relationToOwner(): string
    {
        return 'studentDetails';
    }

    function prefix()
    {
        return '';
    }

    public function hydrate($data)
    {
        $student_detail = $this->generateModel($data);
        return $student_detail;
    }


}

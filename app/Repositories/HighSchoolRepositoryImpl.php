<?php


namespace App\Repositories;


use App\Models\HighSchool;
use App\Repositories\Contracts\HighSchoolRepository;

class HighSchoolRepositoryImpl extends BaseRepositoryImpl implements HighSchoolRepository
{
    protected $required_fields = [
        'roll_no',
        'year',
        'exam_location',
    ];
    protected $additional_fields = [
        'total_mark',
        'distinctions',
        'mark',
    ];

    function model(): string
    {
        return HighSchool::class;
    }


    function relationToOwner(): string
    {
        return 'highSchools';
    }

    function prefix()
    {
        return 'high_school';
    }

    public function hydrate($data)
    {
        $high_school_details = extract_data_from_array($data, 'high_school');
        $additional_data = extract_additional_data($high_school_details, $this->additional_fields);
        $high_school_details['data'] = $additional_data;

        return new HighSchool($high_school_details);
    }


}

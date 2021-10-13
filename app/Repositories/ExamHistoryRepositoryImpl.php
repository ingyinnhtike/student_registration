<?php


namespace App\Repositories;


use App\Models\ExamRecord;
use App\Repositories\Contracts\ExamHistoryRepository;
use Illuminate\Support\Str;

class ExamHistoryRepositoryImpl extends BaseRepositoryImpl implements ExamHistoryRepository
{
    protected $required_fields = [
        'exam',
        'major',
        'roll_no',
        'year',
        'status',
    ];

    protected $additional_fields = [
        'failed_subjects'
    ];

    function model(): string
    {
        return ExamRecord::class;
    }

    function relationToOwner(): string
    {
        return 'examRecords';
    }

    function prefix()
    {
        return '';
    }


    function updateOrCreate($data, $model_owner = null)
    {
        if ($model_owner === null) {
            $model_owner = auth()->user();
        }
        $exam_records = extract_value_from_array('exams', $data);
        $approved_at = extract_value_from_array('approved_at', $data);

        $model_owner->examRecords()->delete();

        $response = [];
        if ($exam_records) {
            foreach ($exam_records as $exam) {
                //create new

                $exam['approved_at'] = $approved_at;
                $response [] = $this->create($exam, $model_owner);

            }
        }

        return $response;
    }


    public function hydrate($data)
    {
        $exams = [];
        $exams_data = extract_value_from_array('exams', $data);
        if ($exams_data) {
            foreach ($exams_data as $key => $data) {
                $exam = $this->generateModel($data, false);
                $exams[$key] = $exam;
            }
        }

        return collect($exams);
    }


}

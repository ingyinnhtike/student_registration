<?php


namespace App\Repositories;


use App\Models\Acceptance;
use App\Models\Enrollment;
use App\Repositories\Contracts\EnrollmentRepository;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class EnrollmentRepositoryImpl extends BaseRepositoryImpl implements EnrollmentRepository
{
    protected $required_fields = [
        'year',
        'major',
        'roll_no',
        'photo',
    ];

    function model(): string
    {
        return Enrollment::class;
    }

    function relationToOwner(): string
    {
        return 'enrollments';
    }

    function prefix()
    {
        return '';
    }


    protected function shouldUpdate($model, $data): bool
    {

        if ($model !== null) {
            $data = $this->getPrimaryData($data);

            if ($data['year'] === $model->year || $model->created_at > Carbon::now()->subMonths(3)) {
                return true;
            } else {
                return false;
            }
        }

        return false;
    }


    public function findOrFail($id): Enrollment
    {
        return Enrollment::with(
            'student.studentDetails',
            'student.parentDetails',
            'student.exams',
            'student.supporters')
            ->where('id', $id)->first();
    }

    public function hydrate($data)
    {
        return new Enrollment($data);
    }


}

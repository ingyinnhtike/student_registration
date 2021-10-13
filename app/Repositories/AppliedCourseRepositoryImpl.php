<?php


namespace App\Repositories;


use App\Models\AppliedCourse;
use App\Models\constracts\HaveTownship;
use App\Models\Course;
use App\Models\Major;
use App\Models\Year;
use App\Repositories\Contracts\AppliedCourseRepository;
use App\Repositories\Contracts\BaseRepository;
use Carbon\Carbon;

class AppliedCourseRepositoryImpl
    extends BaseRepositoryImpl
    implements BaseRepository, AppliedCourseRepository
{
    protected $required_fields = [
        'course_id',
        'roll_no',
        'photo',
    ];

    function model(): string
    {
        return AppliedCourse::class;
    }

    function relationToOwner(): string
    {
        return 'appliedCourses';
    }

    function prefix()
    {
        return '';
    }

    protected function shouldUpdate($model, $data): bool
    {
        if ($model !== null) {
            $data = $this->getPrimaryData($data);

            if ($data['course_id'] === $model->course_id || $model->created_at > Carbon::now()->subMonths(3)) {
                return true;
            }
        }

        return false;
    }

    public function findOrFail($id): AppliedCourse
    {
        return AppliedCourse::with(
            'course',
            'student.studentDetails',
            'student.parentDetails',
            'student.exams',
            'student.supporters')
            ->where('id', $id)->first();
    }

    public function hydrate($data)
    {
        return new AppliedCourse($data);
    }

    public function findAppliedCourse($major_name, $year_name, $type = '')
    {
        if (!is_numeric($major_name)) {
            $major = Major::query()
                ->when($type === 'en', function ($query) use ($major_name) {
                    return $query->where('name_en', $major_name)
                        ->orWhere('key', $major_name);
                })->when($type !== 'en', function ($query) use ($major_name) {
                    return $query->where('name', $major_name);
                })->first();
            if ($major) {
                $major = $major->id;
            } else {
                echo "There is no entry in database for $major_name\n";
            }
        }

        if (!is_numeric($year_name)) {
            $year = Year::query()
                ->when($type === 'en', function ($query) use ($year_name) {
                    return $query->where('name_en', $year_name);
                })->when($type !== 'en', function ($query) use ($year_name) {
                    return $query->where('name', $year_name);
                })->first();

            if ($year) {
                $year = $year->id;
            } else {
                echo "There is no entry in database for $year_name\n";
            }
        }

        return Course::where('major_id', $major)
            ->where('year_id', $year)
            ->first();
    }


}

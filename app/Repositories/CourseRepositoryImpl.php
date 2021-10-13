<?php


namespace App\Repositories;


use App\Helpers\FontHelper;
use App\Models\AppliedCourse;
use App\Models\Course;
use App\Models\Invoice;
use App\Repositories\Contracts\CourseRepository;
use Illuminate\Support\Facades\DB;

class CourseRepositoryImpl implements CourseRepository
{
    public function search($q, $sort = 'year')
    {
        $fontHelper = app()->make(FontHelper::class);
        $q = $fontHelper->convertToUnicode($q, false);
        $courses = Course::query()
            ->where('status', 0)
            ->where(function ($query) use ($q) {

                $query->whereHas('year', function ($query) use ($q) {
                    $query->where('name', 'like', "%$q%")
                        ->orwhere('name_en', 'like', "%$q%");
                })->orWhereHas('major', function ($query) use ($q) {
                    $query->where('name', 'like', "%$q%")
                        ->orwhere('name_en', 'like', "%$q%");
                });
            })
            ->when($sort === 'year', function ($query) {
                return $query->orderby('year_id');
            })
            ->when($sort === 'major', function ($query) {
                return $query->orderby('major_id');
            })
            ->with('major', 'year')
            ->get();
        return $courses;
    }

    public function addFee($data)
    {
        $course_id = extract_value_from_array('course', $data);
        $fee_id = extract_value_from_array('fee', $data);
        $amount = extract_value_from_array('amount', $data);

        $course = Course::findOrFail($course_id);

        return $course->fees()->attach($fee_id, ['amount' => $amount]);
    }

    public function findCourseFee($course_fee_id, $columns)
    {
        return DB::table('course_fee')
            ->join('courses', 'courses.id', '=', 'course_fee.course_id')
            ->join('fees', 'fees.id', '=', 'course_fee.fee_id')
            ->select($columns)
            ->where('course_fee.id', $course_fee_id)
            ->first();
    }

    public function destroyCourseFee($course_fee_id)
    {
        return DB::table('course_fee')
            ->delete($course_fee_id);
    }


    public function updateFee($data)
    {
        $course_id = extract_value_from_array('course', $data);
        $fee_id = extract_value_from_array('fee', $data);
        $amount = extract_value_from_array('amount', $data);

        $course = Course::findOrFail($course_id);

    }


    public function studentsReport($major_ids = null, $year_ids = null)
    {
        $sub_query = DB::table('applied_courses')
            ->select('course_id')
            ->selectRaw('count(id) as total')
            ->groupBy('course_id');
        $query = Course::query()
            ->with('major', 'year')
            ->when($major_ids, function ($query, $major_ids) {
                return $query->wherein('major_id', $major_ids);
            })
            ->when($year_ids, function ($query, $year_ids) {
                return $query->wherein('year_id', $year_ids);
            })
            ->joinSub($sub_query, 'applied_courses', function ($query) {
                $query->on('applied_courses.course_id', '=', 'courses.id');
            })
            ->orderBy('year_id');
        return $query->get();
    }

    public function paymentReport()
    {
        $sub_query = Invoice::query()
            ->select('id', 'form_id')
            ->selectRaw()
            ->get();
        dd($sub_query->first());
        $query = Course::query()
            ->joinSub($sub_query, 'applied_courses', function ($query) {
                $query->on('applied_courses.course_id', '=', 'courses.id');
            });

        return dd($query->get());
    }

}

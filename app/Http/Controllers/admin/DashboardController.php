<?php

namespace App\Http\Controllers\admin;

use App\Helpers\Authorizable;
use App\Http\Controllers\Controller;
use App\Http\Resources\CourseCollection;
use App\Models\Major;
use App\Models\Year;
use App\Repositories\Contracts\CourseRepository;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    use Authorizable;

    public function index(Request $request, CourseRepository $courseRepository)
    {
        $courses = $courseRepository->studentsReport();
        $majors = Major::all();
        $years = Year::all();
        $majors = $majors->pluck('id', ['name']);
        $years = $years->pluck('id', ['name']);
        return view('admin.dashboard', compact('courses', 'majors', 'years'));
    }

    public function getSummary(Request $request, CourseRepository $courseRepository)
    {
        $data = $request->all();
        $year_ids = null;
        $major_ids = null;

        $years = extract_value_from_array('သင်တန်းနှစ်', $data);
        if ($years) {
            $year_ids = array_values($years);
        }

        $majors = extract_value_from_array('အဓိကဘာသာ', $data);
        if ($majors) {
            $major_ids = array_values($majors);
        }

        $courses = $courseRepository->studentsReport($major_ids, $year_ids);

        return new CourseCollection($courses);
    }
}

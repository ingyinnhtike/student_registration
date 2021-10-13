<?php


namespace App\Helpers\ChartAdapters;


use App\Helpers\ChartAdapters\Traits\GenderDataSet;
use App\Models\Major;
use Auth;
use Illuminate\Support\Facades\DB;

class ByMajorChartAdapter extends BaseChartAdapter
{

    use GenderDataSet;

    function query()
    {
        $user_id = Auth::User()->id;
        
        if($user_id == 3)
        {
        return DB::table('student_details')
            ->select('majors.name_en as label')
            ->selectRaw('ifNull(count(nullIf(0,student_details.gender)),0) as male_total')
            ->selectRaw('ifNull(count(nullIf(1,student_details.gender)),0) as female_total')
            ->join('applied_courses', 'applied_courses.user_id', 'student_details.user_id')
            ->join('courses', 'courses.id', 'applied_courses.course_id')
            ->join('majors', 'courses.major_id', 'majors.id')
            ->where('university_status', 1)
            ->groupBy('courses.major_id')
            ->orderBy('courses.major_id');
        }
        else if($user_id == 1)
        {
            return DB::table('student_details')
            ->select('majors.name_en as label')
            ->selectRaw('ifNull(count(nullIf(0,student_details.gender)),0) as male_total')
            ->selectRaw('ifNull(count(nullIf(1,student_details.gender)),0) as female_total')
            ->join('applied_courses', 'applied_courses.user_id', 'student_details.user_id')
            ->join('courses', 'courses.id', 'applied_courses.course_id')
            ->join('majors', 'courses.major_id', 'majors.id')
            ->where('university_status', 0)
            ->groupBy('courses.major_id')
            ->orderBy('courses.major_id');
        }
        else{
            return DB::table('student_details')
            ->select('majors.name_en as label')
            ->selectRaw('ifNull(count(nullIf(0,student_details.gender)),0) as male_total')
            ->selectRaw('ifNull(count(nullIf(1,student_details.gender)),0) as female_total')
            ->join('applied_courses', 'applied_courses.user_id', 'student_details.user_id')
            ->join('courses', 'courses.id', 'applied_courses.course_id')
            ->join('majors', 'courses.major_id', 'majors.id')
            ->groupBy('courses.major_id')
            ->orderBy('courses.major_id');
        }
    }

    function title()
    {
        return 'အထူးပြုဘာသာအလိုက် ကျောင်းသားအရေအတွက်';
    }

    function labels()
    {
        return Major::all()->pluck('name_en');
    }


}

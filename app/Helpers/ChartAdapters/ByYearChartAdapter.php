<?php


namespace App\Helpers\ChartAdapters;


use App\Helpers\ChartAdapters\Traits\GenderDataSet;
use App\Models\Year;
use Auth;
use Illuminate\Support\Facades\DB;

class ByYearChartAdapter extends BaseChartAdapter
{

    use GenderDataSet;

    function query()
    {
        $user_id = Auth::User()->id;
        if($user_id == 3)
        {
        return DB::table('student_details')
            ->select('years.name_en as label')
            ->selectRaw('ifNull(count(nullIf(0,student_details.gender)),0) as male_total')
            ->selectRaw('ifNull(count(nullIf(1,student_details.gender)),0) as female_total')
            ->join('applied_courses', 'applied_courses.user_id', 'student_details.user_id')
            ->join('courses', 'courses.id', 'applied_courses.course_id')
            ->join('years','years.id','courses.year_id')
            ->where('university_status', 1)
            ->groupBy('courses.year_id')
            ->orderBy('courses.year_id');
        }
        else if($user_id == 1)
        {
            return DB::table('student_details')
            ->select('years.name_en as label')
            ->selectRaw('ifNull(count(nullIf(0,student_details.gender)),0) as male_total')
            ->selectRaw('ifNull(count(nullIf(1,student_details.gender)),0) as female_total')
            ->join('applied_courses', 'applied_courses.user_id', 'student_details.user_id')
            ->join('courses', 'courses.id', 'applied_courses.course_id')
            ->join('years','years.id','courses.year_id')
            ->where('university_status', 0)
            ->groupBy('courses.year_id')
            ->orderBy('courses.year_id');
        }
        else{
            return DB::table('student_details')
            ->select('years.name_en as label')
            ->selectRaw('ifNull(count(nullIf(0,student_details.gender)),0) as male_total')
            ->selectRaw('ifNull(count(nullIf(1,student_details.gender)),0) as female_total')
            ->join('applied_courses', 'applied_courses.user_id', 'student_details.user_id')
            ->join('courses', 'courses.id', 'applied_courses.course_id')
            ->join('years','years.id','courses.year_id')
            ->groupBy('courses.year_id')
            ->orderBy('courses.year_id');
        }
    }

    function title()
    {
        return "သင်တန်းနှစ်အလိုက် ကျောင်းသားအရေအတွက်";
    }

    function labels()
    {
        return Year::all()->pluck('name_en');
    }


}

<?php


namespace App\Helpers\ChartAdapters;

use App\Helpers\ChartAdapters\Traits\GenderDataSet;
use App\State;
use Auth;
use Illuminate\Support\Facades\DB;

class ByStateChartAdapter extends BaseChartAdapter
{
    use GenderDataSet;

    public function query()
    {
        $user_id = Auth::User()->id;
        if($user_id == 3)
        {
        return DB::table('student_details')
            ->select('states.name as label')
            ->selectRaw('ifNull(count(nullIf(0,student_details.gender)),0) as male_total')
            ->selectRaw('ifNull(count(nullIf(1,student_details.gender)),0) as female_total')
            ->join('states', 'states.id', 'student_details.state')
            ->where('university_status', 1)
            ->groupBy('student_details.state')
            ->orderBy('student_details.state');

        }else if($user_id == 1){
            return DB::table('student_details')
            ->select('states.name as label')
            ->selectRaw('ifNull(count(nullIf(0,student_details.gender)),0) as male_total')
            ->selectRaw('ifNull(count(nullIf(1,student_details.gender)),0) as female_total')
            ->join('states', 'states.id', 'student_details.state')
            ->where('university_status', 0)
            ->groupBy('student_details.state')
            ->orderBy('student_details.state');
        }else{
            return DB::table('student_details')
            ->select('states.name as label')
            ->selectRaw('ifNull(count(nullIf(0,student_details.gender)),0) as male_total')
            ->selectRaw('ifNull(count(nullIf(1,student_details.gender)),0) as female_total')
            ->join('states', 'states.id', 'student_details.state')
            ->groupBy('student_details.state')
            ->orderBy('student_details.state');
        }
    }

    function title()
    {
        return "တိုင်းဒေသကြီးအလိုက် ကျောင်းသားအရေအတွက်";
    }

    function labels()
    {
        return State::all()->pluck('name');
    }


}

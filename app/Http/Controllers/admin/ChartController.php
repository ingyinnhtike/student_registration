<?php

namespace App\Http\Controllers\admin;

use App\Helpers\ChartAdapters\ByMajorChartAdapter;
use App\Helpers\ChartAdapters\ByStateChartAdapter;
use App\Helpers\ChartAdapters\ByYearChartAdapter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function getChart(Request $request)
    {
        
        $type = $request->get('type');
        
        if ($type === 'byState') {
            $chartAdapter = new ByStateChartAdapter();
        } elseif ($type === 'byMajor') {
            $chartAdapter = new ByMajorChartAdapter();
        } else {
            $chartAdapter = new ByYearChartAdapter();
        }
        $data = $chartAdapter->toJson();
        
        return view('admin.charts.bystate', compact('data'));
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Exports\CustomExport;
use App\Exports\FormExport;
use App\Helpers\Authorizable;
use App\Helpers\LogHelper;
use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\Year;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    use Authorizable;
    use LogHelper;

    public function index()
    {
        $reports = config('common.reports');
        $majors = Major::all();
        $years = Year::all();

        $majors = $majors->pluck('id', ['name']);
        $years = $years->pluck('id', ['name']);

        return view('admin.report.index', compact('reports', 'majors', 'years'));
    }

    public function excel(Request $request)
    {

        $filename = $this->filename() . '.xlsx';
//        $this->recordLog($filename, 'excel_report', $request->all());
        return Excel::download(new CustomExport($request->all()), $filename);
    }

    protected function filename()
    {
        return 'Report_' . date('YmdHis');
    }
}

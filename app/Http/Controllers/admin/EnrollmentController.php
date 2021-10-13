<?php

namespace App\Http\Controllers\admin;

use App\DataTables\EnrollmentDataTable;
use App\Helpers\Authorizable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    use Authorizable;
    public function index(EnrollmentDataTable $dataTable)
    {
        return $dataTable->render('admin.enrollment.index');
    }

    public function show($id){
        dd($id);
    }
}

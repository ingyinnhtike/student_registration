<?php

namespace App\Http\Controllers\admin;

use App\DataTables\CourseDataTable;
use App\Helpers\Authorizable;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Fee;
use App\Models\Major;
use App\Models\Year;
use App\Repositories\Contracts\CourseRepository;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    use Authorizable;

    public function index(CourseDataTable $dataTable)
    {
        return $dataTable->render('admin.course.index');
    }


    public function create()
    {
        $majors = Major::all();
        $years = Year::all();
        $fees = Fee::all();
        return view('admin.course.create', compact('majors', 'years', 'fees'));
    }


    public function store(Request $request)
    {
        $data = $request->all();

        $course = Course::create($data);
        return redirect()->route('admin.course.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $course = Course::with('fees')->findorfail($id);
        $majors = Major::all();
        $years = Year::all();
        $fees = Fee::all();
        return view('admin.course.edit', compact('course', 'majors', 'years', 'fees'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();
        $course = Course::find($id);
        $course = $course->update($data);
        return redirect()->route('admin.course.index');
    }


    public function destroy($id)
    {
        $course = Course::with('major', 'year')->findOrFail($id);
        $status = $course->delete();
        return response()->json(['message' => "{$course->year->name} {$course->major->name} မေဂျာကို ဖျက်ပီးပါပြီ။", 'status' => $status]);
    }
}

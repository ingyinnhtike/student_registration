<?php

namespace App\Http\Controllers\admin;

use App\DataTables\MajorDatatable;
use App\Helpers\Authorizable;
use App\Http\Controllers\Controller;
use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    use Authorizable;

    public function index(MajorDatatable $datatable)
    {
        return $datatable->render('admin.major.index');
    }


    public function create()
    {
        return view('admin.major.create');
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $major = Major::create($data);
        return redirect()->route('admin.major.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $major = Major::findOrFail($id);
        return view('admin.major.edit', compact('major'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();
        $major = Major::findOrFail($id);
        $major->update($data);
        return redirect()->route('admin.major.index');
    }


    public function destroy($id)
    {
        $major = Major::findOrFail($id);
        $status = $major->delete();
        return response()->json(['message' => "{$major->name} မေဂျာကို ဖျက်ပီးပါပြီ။", 'status' => $status]);

    }
}

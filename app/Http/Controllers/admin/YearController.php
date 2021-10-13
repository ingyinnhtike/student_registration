<?php

namespace App\Http\Controllers\admin;

use App\DataTables\YearDataTable;
use App\Helpers\Authorizable;
use App\Http\Controllers\Controller;
use App\Models\Year;
use Illuminate\Http\Request;

class YearController extends Controller
{
    use Authorizable;

    public function index(YearDataTable $dataTable)
    {
        return $dataTable->render('admin.year.index');
    }


    public function create()
    {
        return view('admin.year.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $year = Year::create($data);
        return redirect()->route('admin.year.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $year = Year::findOrFail($id);
        return view('admin.year.edit', compact('year'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();
        $year = Year::findOrFail($id);
        $year->update($data);
        return redirect()->route('admin.year.index');
    }


    public function destroy($id)
    {
        $year = Year::findOrFail($id);
        $status = $year->delete();
        return response()->json(['message' => "{$year->name} ကို ဖျက်ပီးပါပြီ။", 'status' => $status]);
    }
}

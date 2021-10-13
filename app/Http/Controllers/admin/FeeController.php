<?php

namespace App\Http\Controllers\admin;

use App\DataTables\FeeDatatable;
use App\Helpers\Authorizable;
use App\Http\Controllers\Controller;
use App\Models\Fee;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    use Authorizable;

    public function index(FeeDatatable $dataTable)
    {
        return $dataTable->render('admin.fee.index');
    }


    public function create()
    {
        return view('admin.fee.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $fee = Fee::create($data);
        return redirect()->route('admin.fee.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $fee = Fee::findOrFail($id);
        return view('admin.fee.edit', compact('fee'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();
        $fee = Fee::findOrFail($id);
        $fee->update($data);
        return redirect()->route('admin.fee.index');
    }


    public function destroy($id)
    {
        $fee = Fee::findOrFail($id);
        $status = $fee->delete();
        return response()->json(['message' => "{$fee->name} ကို ဖျက်ပီးပါပြီ။", 'status' => $status]);
    }
}

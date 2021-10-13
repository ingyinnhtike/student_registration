<?php

namespace App\Http\Controllers\admin;

use App\DataTables\PermissionDataTable;
use App\Helpers\Authorizable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    use Authorizable;

    public function index(PermissionDataTable $dataTable)
    {
        return $dataTable->render('admin.permission.index');
    }


    public function create()
    {
        return view('admin.permission.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $permission = Permission::create($data);
        return redirect()->route('admin.permission.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('admin.permission.edit', compact('permission'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();
        $permission = Permission::findOrFail($id);
        $permission->update($data);
        return redirect()->route('admin.permission.index');
    }


    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $status = $permission->delete();
        return response()->json(['message' => "{$permission->display_name} ကို ဖျက်ပီးပါပြီ။", 'status' => $status]);
    }
}

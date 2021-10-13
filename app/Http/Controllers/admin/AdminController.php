<?php

namespace App\Http\Controllers\admin;

use App\Helpers\Authorizable;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\RoleRepository;
use App\Repositories\Contracts\UserRepository;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    use Authorizable;


    public function showRoles(RoleRepository $roleRepository, UserRepository $userRepository)
    {

        $roles = $roleRepository->getEditableRoles();
        $admins = $userRepository->getEditableAdmins($roles);
        return view('admin.roles.change_roles', compact('admins', 'roles'));
    }

    public function updateRoles(Request $request, RoleRepository $roleRepository, UserRepository $userRepository)
    {
        $data = $request->all();
        $roles = $roleRepository->getEditableRoles();
        $admins = $userRepository->getEditableAdmins($roles);

        $editable_role_ids = $roles->pluck('id');

        foreach ($admins as $admin) {

            $role_ids = extract_value_from_array($admin->id, $data);
            if ($role_ids) {
                $editable_roles = $roleRepository->removeUneditableRoles($role_ids, $editable_role_ids);
                $admin->roles()->sync($editable_roles);
            }
        }

        return redirect()->route('admin.role.change.show');
    }

    public function showPermissions()
    {
        $roles = Role::where('name', '<>', 'Super Admin')->with('permissions')->get();
        $permissions = Permission::query()->orderBy('name')->get();
        return view('admin.roles.change_permission', compact('roles', 'permissions'));
    }

    public function updatePermissions(Request $request)
    {
        $data = $request->all();
        $roles = Role::where('name', '<>', 'Super Admin')->with('permissions')->get();
        foreach ($roles as $role) {
            $permission_ids = extract_value_from_array($role->id, $data);
            if ($permission_ids) {
                $role->permissions()->sync($permission_ids);
            }
        }
        return redirect()->route('admin.permission.change.show');
    }
}

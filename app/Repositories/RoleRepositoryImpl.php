<?php


namespace App\Repositories;


use App\Repositories\Contracts\RoleRepository;
use Illuminate\Support\Collection;
use Spatie\Permission\Models\Role;

class RoleRepositoryImpl implements RoleRepository
{
    public function getEditableRoles()
    {
        return Role::query()
            ->when(!auth()->user()->hasRole('Super Admin'), function ($query) {
                return $query->where('name', '<>', 'Super Admin');
            })
            ->get();
    }

    public function removeUneditableRoles($role_ids, $editable_role_ids)
    {
        if (!$editable_role_ids instanceof Collection) {
            $editable_role_ids = collect($editable_role_ids);
        }
        return array_filter($role_ids, function ($role_id) use ($editable_role_ids) {
            return $editable_role_ids->contains($role_id);
        });
    }


}

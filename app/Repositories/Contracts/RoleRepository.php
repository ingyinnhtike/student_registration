<?php


namespace App\Repositories\Contracts;


interface RoleRepository
{
    public function getEditableRoles();

    public function removeUneditableRoles($role_ids, $editable_role_id);
}

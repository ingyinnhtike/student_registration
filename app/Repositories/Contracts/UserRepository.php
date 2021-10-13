<?php


namespace App\Repositories\Contracts;


interface UserRepository extends BaseRepository
{
    public function findOrCreate(array $where, array $data);

    public function getEditableAdmins($roles);
}

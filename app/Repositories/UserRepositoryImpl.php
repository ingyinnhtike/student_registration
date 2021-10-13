<?php


namespace App\Repositories;


use App\Repositories\Contracts\UserRepository;
use App\User;

class UserRepositoryImpl implements UserRepository
{
    function model(): string
    {
        return User::class;;
    }

    function relationToOwner(): string
    {
        return '';
    }

    function prefix()
    {
        '';
    }

    function updateOrCreate(array $data, $model_owner = null)
    {
        // TODO: Implement updateOrCreate() method.
    }

    public function findOrCreate($where, $data)
    {
        return User::firstOrCreate($where, $data);
    }

    public function create($data, $user = null)
    {
        // TODO: Implement create() method.
    }

    public function update($data, $model, $user = null)
    {
        // TODO: Implement update() method.
    }

    public function hydrate($data)
    {
        return new User($data);
    }

    public function getEditableAdmins($roles)
    {
        return User::whereNotNull('email')->role($roles)->with('roles')->get();
    }


}

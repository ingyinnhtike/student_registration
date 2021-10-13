<?php


namespace App\Repositories\Contracts;


interface BaseRepository
{
    /**
     * Name of the model
     * @return string
     */
    function model(): string;


    /**
     * name of relation method defined in Owner Model
     * @return string
     */
    function relationToOwner(): string;

    /**
     * prefix or prefixes used in data array
     * @return mixed
     */
    function prefix();


    function create($data, $model_owner = null);

    function update($data, $model, $model_owner = null);

    /**
     * @param array $data
     * @param null $model_owner
     * @return mixed
     */
    function updateOrCreate(array $data, $model_owner = null);

    function hydrate($data);
}

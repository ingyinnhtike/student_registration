<?php


namespace App\Helpers\Forms\Contracts;


use Illuminate\Database\Eloquent\Model;

interface BaseFormHelper
{
    /**
     * insert/update database from Form data
     * @param array $data
     * @param Model|null $user
     * @return mixed
     */
    function populate(array $data, Model $user = null);

    /**
     * generate models from Form data
     * @param array $data
     * @return mixed
     */
    function hydrate(array $data);

}

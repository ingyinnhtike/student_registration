<?php


namespace App\Repositories;


use App\Model\Supporter;
use App\Repositories\Contracts\SupporterRepository;

class SupporterRepositoryImpl extends  BaseRepositoryImpl implements SupporterRepository
{
    function model(): string
    {
       return Supporter::class;
    }

    function relationToOwner(): string
    {
        return 'supporters';
    }

    function prefix()
    {
        return 'supporter';
    }


    public function create($data, $user = null)
    {
        if ($user === null) {
            $user = auth()->user();
        }

        $data = extract_data_from_array($data,'supporter');
        return $user->supporters()->updateOrCreate($data);

    }

    public function update($data, $model, $user = null)
    {

        if ($user === null) {
            $user = auth()->user();
        }
        if (is_integer($model)) {
            $model = Supporter::findOrFail($model);
        }

        $detail = extract_data_from_array($data,'supporter');
        return $model->update($detail);
    }

    function updateOrCreate($data, $model_owner = null)
    {
        // TODO: Implement updateOrCreate() method.
    }



    public function hydrate($data)
    {
        $data = extract_data_from_array($data,'supporter');
        return new Supporter($data);
    }


}

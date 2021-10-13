<?php


namespace App\Repositories;


use App\Repositories\Contracts\BaseRepository;
use App\Repositories\Contracts\SiblingRepository;
use App\Sibling;

class SiblingRepositoryImpl extends BaseRepositoryImpl implements SiblingRepository, BaseRepository
{
    protected $required_fields = [
        'name',
        'work',
        'address'
    ];

    function model(): string
    {
        return Sibling::class;
    }

    function relationToOwner(): string
    {
        return 'siblings';
    }

    function prefix()
    {
        return '';
    }


    public function updateOrCreate(array $original_data, $model_owner = null)
    {
        if ($model_owner === null) {
            $model_owner = auth()->user();
        }
        $siblings = extract_value_from_array('siblings', $original_data);
        $siblings_in_db = $model_owner->siblings;

        $responses = [];
        if ($siblings) {
            foreach ($siblings as $key => $sibling) {
                $sibling_in_db = $siblings_in_db->get($key);
                if ($sibling_in_db) {
                    $responses[] = $this->update($sibling, $sibling_in_db, $model_owner);

                } else {
                    $responses[] = $this->create($sibling, $model_owner);
                }
            }
            //todo: implement delete
        }
        return $responses;
    }


    function hydrate($data)
    {
        $siblingData = extract_value_from_array('siblings', $data);
        $siblings = [];
        if($siblingData) {
            foreach ($siblingData as $data) {
                $sibling = $this->generateModel($data, false);
                $siblings[] = $sibling;
            }
        }
        return $siblings;
    }


}

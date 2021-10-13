<?php


namespace App\Repositories;


use App\Models\Scholarship;
use App\Repositories\Contracts\ScholarshipRepository;
use function Psy\sh;

class ScholarshipRepositoryImpl extends BaseRepositoryImpl implements ScholarshipRepository
{
    protected $required_fields = [
        'name', 'organization', 'amount'
    ];

    function model(): string
    {
        return Scholarship::class;
    }

    function relationToOwner(): string
    {
        return 'scholarShips';
    }

    function prefix()
    {
        return 'scholar';
    }


    public function hydrate($data)
    {
        $scholar = $this->generateModel($data);
        return $scholar;
    }

}

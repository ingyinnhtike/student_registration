<?php


namespace App\Repositories;


use App\Models\constracts\HaveTownship;
use App\Models\ParentDetail;
use App\Repositories\Contracts\ParentDetailRepository;
use Illuminate\Support\Str;

class ParentDetailRepositoryImpl extends BaseRepositoryImpl implements ParentDetailRepository
{
    protected $required_fields = [
        'name_mm',
        'name_eng',
    ];

    protected $additional_fields = [
        'is_guardian',
        'email',
        'nrc_issue_date',
        'death_date',
        'district'
    ];


    function model(): string
    {
        return ParentDetail::class;
    }

    function relationToOwner(): string
    {
        return 'parentDetails';
    }

    function prefix()
    {
        return ['father', 'mother', 'adoptive_father', 'adoptive_mother', 'other'];
    }

    function updateOrCreate($data, $model_owner = null)
    {
        if ($model_owner === null) {
            $model_owner = auth()->user();
        }

        $guardians = [];

        foreach ($this->prefix() as $guardian_type) {
            if ($guardian_type !== 'other') {
                $parentDetail = $model_owner->parentDetails()->where('relation_to_user', $guardian_type)->first();
            } else {
                $parentDetail = $model_owner->parentDetails()->whereNotIn('relation_to_user', $this->prefix())->first();
            }

            if ($parentDetail) {
                //update
                $guardian_data = extract_data_from_array($data, $guardian_type);
                $approved_at = extract_value_from_array('approved_at',$data);
                $guardian_data['approved_at'] = $approved_at;
                $this->use_prefix = false;
                $guardians [] = $this->update($guardian_data, $parentDetail, $model_owner);
                $this->use_prefix = true;

            } else {
                //create
                $guardian_data = extract_data_from_array($data, $guardian_type);
                $approved_at = extract_value_from_array('approved_at',$data);
                $guardian_data['approved_at'] = $approved_at;
                $this->use_prefix = false;
                $guardians [] = $this->create($guardian_data, $model_owner);
                $this->use_prefix = true;


            }
        }
        return $guardians;
    }


    public function hydrate($data)
    {
        $parentDetails = [];
        foreach ($this->prefix() as $guardian_type) {
            $guardian_data = extract_data_from_array($data, $guardian_type);
            $parentDetails[] = $this->generateModel($guardian_data, false);

        }

        return collect($parentDetails);
    }

}

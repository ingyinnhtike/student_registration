<?php


namespace App\Repositories;


use App\Helpers\FontHelper;
use App\Repositories\Contracts\TownshipRepository;
use App\Township;

class TownshipRepositoryImpl implements TownshipRepository
{
    protected $township_required_persons = [
        '',
        'father',
        'mother',
        'other'
    ];

    public function search($q)
    {
        $fontHelper = app()->make(FontHelper::class);
        $q = $fontHelper->convertToUnicode($q, false);
        $townships = Township::where('name', 'like', "%$q%")
            ->with('district.state')
            ->limit(10)->get();
        return $townships;
    }

    public function transformData($data)
    {
        foreach ($this->township_required_persons as $township_required_person) {
            $data = $this->transform($data, $township_required_person);
        }
        return $data;
    }

    private function transform($data, $prefix = '')
    {
        $prefix = $prefix === '' ? $prefix : $prefix . '_';
        $township_id = extract_value_from_array($prefix . 'birth_place', $data);
        if($township_id === null) {
            $township_id = extract_value_from_array($prefix . 'hidden_birth_place', $data);
        }
        if ($township_id) {
            $township = Township::with('district.state')->find($township_id);
            $data[$prefix . 'township'] = $township->id;
            $data[$prefix . 'state'] = $township->district->state->id;
            $data[$prefix . 'district'] = $township->district->id;
        }

        return $data;
    }


}

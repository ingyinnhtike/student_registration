<?php


namespace App\Models\Traits;

use App\District;
use App\State;
use App\Township;

trait ModelHaveTownship
{
    public function townshipModel()
    {
        return $this->morphToMany(Township::class, 'model','township_user');
    }

    public function saveTownship($township)
    {
        if (is_numeric($township)) {
            return $this->townshipModel()->sync([$township]);
        } else {
            return $township;
        }
    }

    public function getTownshipNameAttribute()
    {
        $township = $this->attributes['township'] ?? 0;
        if ($township > 0) {
            return Township::find($township)->name;
        } else {
            return '-';
        }
    }

    public function getDistrictNameAttribute()
    {
        $district = $this->data['district'] ?? 0;
        if ($district > 0) {
            return District::find($district)->name;
        } else {
            return '-';
        }
    }

    public function getStateNameAttribute()
    {
        $state = $this->attributes['state'] ?? 0;
        if ($state > 0) {
            return State::find($state)->name;
        } else {
            return '-';
        }
    }
}

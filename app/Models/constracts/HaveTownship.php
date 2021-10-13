<?php


namespace App\Models\constracts;

interface HaveTownship
{
    public function townshipModel();

    public function getTownshipNameAttribute();

    public function getDistrictNameAttribute();

    public function getStateNameAttribute();

    public function saveTownship($township);
}

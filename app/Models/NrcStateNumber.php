<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NrcStateNumber extends Model
{
    protected $table = 'nrc_state_numbers';

    public function townships()
    {
        return $this->hasMany(NrcTownship::class,'state_id');
    }

}

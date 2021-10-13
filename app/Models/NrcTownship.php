<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NrcTownship extends Model
{
    protected $table = 'nrc_townships';

    public function stateNumber()
    {
        return $this->belongsTo(NrcStateNumber::class, 'state_id');
    }

}

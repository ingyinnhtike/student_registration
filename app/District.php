<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = [
        'state_id',
        'name',
        'name_eng',
    ];

    public $timestamps = false;

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function townships()
    {
        return $this->hasMany(Township::class);
    }
}

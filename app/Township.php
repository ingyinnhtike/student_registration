<?php

namespace App;

use App\Models\ParentDetail;
use App\Models\StudentDetail;
use Illuminate\Database\Eloquent\Model;

class Township extends Model
{
    protected $fillable = [
        'district_id',
        'name',
        'name_eng'
    ];

    public $timestamps = false;
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function students()
    {
        return $this->morphedByMany(StudentDetail::class, 'model');
    }

    public function parents()
    {
        return $this->morphedByMany(ParentDetail::class, 'model');
    }
}

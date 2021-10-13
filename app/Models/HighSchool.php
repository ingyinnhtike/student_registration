<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class HighSchool extends Model
{
    protected $fillable = [
        'roll_no',
        'year',
        'exam_location',
        'data'
    ];

    protected $casts = [
        'data'=>'array',
    ];

    public function student()
    {
        return $this->belongsTo(User::class);
    }
}

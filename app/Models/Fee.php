<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $fillable = [
        'name',
        'name_en',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class)
            ->withPivot('amount');
    }
}

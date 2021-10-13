<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $fillable = [
        'name',
        'name_en'
    ];

    public function courses(){
        return $this->hasMany(Course::class);
    }

    public function majors()
    {
        return $this->belongsToMany(Major::class, 'courses')
            ->withPivot([
                'status',
                'created_by',
                'updated_by'
            ]);
    }
}

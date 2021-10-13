<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $fillable = [
        'name',
        'name_en',
        'key'
    ];

    public function courses(){
        return $this->hasMany(Course::class);
    }

    public function years()
    {
        return $this->belongsToMany(Year::class, 'courses')
            ->withPivot([
                'status',
                'created_by',
                'updated_by'
            ]);
    }
}

<?php

namespace App\Models;


use App\User;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{


    protected $fillable = [
        'year_id',
        'major_id',
        'status',
    ];

    public function fees()
    {
        return $this->belongsToMany(
            Fee::class)
            ->withPivot('amount','id');
    }

    public function appliedCourses()
    {
        return $this->hasMany(AppliedCourse::class);
    }

    public function students()
    {
        return $this->belongsToMany(
            User::class,
            'applied_courses',
            'course_id',
            'user_id');
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function year()
    {
        return $this->belongsTo(Year::class);
    }

    public function getStatusStringAttribute()
    {
        $status = $this->attributes['status'];
        return $status === 0 ? 'ဖွင့်' : 'ပိတ်';

    }

}

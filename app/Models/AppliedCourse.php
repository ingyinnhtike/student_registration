<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class AppliedCourse extends Model
{
    use LogsActivity;
    protected static $recordEvents = ['updated', 'deleted'];
    protected static $logName = 'student_detail';
    protected static $logAttributes = [
        'course_id',
        'roll_no',
        'photo',
        'stipend',
        'boudoir',
        'current_address',
        'current_phone',
        'data'
    ];

    protected static $logOnlyDirty = true;

    protected $fillable = [
        'course_id',
        'roll_no',
        'photo',
        'stipend',
        'boudoir',
        'current_address',
        'current_phone',
        'data',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}

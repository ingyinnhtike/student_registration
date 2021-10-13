<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ExamRecord extends Model
{
    use LogsActivity;
    protected static $recordEvents = ['updated', 'deleted'];
    protected static $logName = 'exam';
    protected static $logAttributes = [
        'exam',
        'major',
        'roll_no',
        'year',
        'status',
        'data',
    ];
    protected static $logOnlyDirty = true;

    protected $fillable = [
        'exam',
        'major',
        'roll_no',
        'year',
        'status',
        'data'
    ];

    protected $casts = [
        'major'=>'array',
        'data' => 'array',
    ];

    //================ relation methods start ================
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //================ relation methods end ================

    public function getStatusStringAttribute($value)
    {
        $value = $this->attributes['status'] ?? 0;
        return $value === 0 ? 'ရှုံး' : 'အောင်';
    }

    public function setStatusAttribute($value)
    {
        if ($value === 'pass') {
            $value = 1;
        } elseif ($value === 'fail') {
            $value = 0;
        }
        $this->attributes['status'] = $value;
    }

    public function getExamStringAttribute($value)
    {
        $value = $this->attributes['exam'];
        $exams = get_config('form-setting.exam_years');
        return $exams[$value] ?? $value;
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Sibling extends Model
{
    use LogsActivity;
    protected static $recordEvents = ['updated', 'deleted'];
    protected static $logName = 'student_detail';
    protected static $logAttributes = [
        'name',
        'work',
        'address',
        'nrc',
        'nrc_issued_at',
        'data',

    ];
    protected static $logOnlyDirty = true;

    protected $fillable = [
        'name',
        'work',
        'address',
        'nrc',
        'nrc_issued_at',
        'data',
    ];

    protected $casts = [
        'data' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

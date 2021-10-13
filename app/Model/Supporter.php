<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Supporter extends Model
{
    use LogsActivity;
    protected static $recordEvents = ['updated', 'deleted'];
    protected static $logName = 'student_detail';
    protected static $logAttributes = [
        'name',
        'relation_to_user',
        'email',
        'work',
        'address',
        'phone',
        'data'
    ];

    protected static $logOnlyDirty = true;
    protected $fillable = [
        'name',
        'relation_to_user',
        'work',
        'email',
        'address',
        'phone',
        'data',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}

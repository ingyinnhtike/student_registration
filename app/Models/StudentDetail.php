<?php

namespace App\Models;


use App\Models\constracts\HaveTownship;
use App\Models\Traits\ModelHaveTownship;
use App\Township;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class StudentDetail extends Model implements HaveTownship
{
    use LogsActivity;
    use ModelHaveTownship;

    protected static $recordEvents = ['updated', 'deleted'];
    protected static $logName = 'student_detail';
    protected static $logAttributes = [                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
        'name_mm',
        'name_eng',
        'email',
        'race',
        'religion',
        'township',
        'state',
        'nrc',
        'nrc2',
        'blood_type',
        'designation',
        'dob',
        'university_roll_no',
        'university_start_year',
        'gender',
        'permanent_address',
        'permanent_phone',
        'data',

    ];
    protected static $logOnlyDirty = true;

    protected $fillable = [
        'university_status',
        'name_mm',
        'name_eng',
        'email',
        'race',
        'religion',
        'township',
        'state',
        'nrc',
        'nrc2',
        'blood_type',
        'designation',
        'dob',
        'university_roll_no',
        'university_start_year',
        'gender',
        'permanent_address',
        'permanent_phone',
        'data'
    ];

    protected $casts = [
        'data' => 'array',
    ];

    //================ relation methods start ================

    public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    //================ relation methods end ================


    //================ mutator start ================

    public function getStateAttribute($value)
    {
        $states = config('constants.states');
        return $states[$value] ?? 'Unknown';
    }

    public function getGenderStringAttribute($value)
    {
        $value = $this->attributes['gender'];
        return $value === 0 ? 'မ' : 'ကျား';
    }

    public function setGenderAttribute($value)
    {
        $gender = 0;
        if ($value === 'female') {
            $gender = 0;
        } elseif ($value === 'male') {
            $gender = 1;
        } else {
            $gender = $value;
        }

        $this->attributes['gender'] = $gender;
    }

    
    
    //================ mutator end ================
}

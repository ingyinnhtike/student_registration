<?php

namespace App\Models;

use App\Models\constracts\HaveTownship;
use App\Models\Traits\ModelHaveTownship;
use App\Township;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ParentDetail extends Model implements HaveTownship
{
    use LogsActivity;
    use ModelHaveTownship;

    protected static $recordEvents = ['updated', 'deleted'];
    protected static $logName = 'parent_detail';
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
        'relation_to_user',
        'address',
        'phone',
        'work',
        'availability',
        'data'
    ];

    protected static $logOnlyDirty = true;

    protected $fillable = [
        'name_mm',
        'name_eng',
        'race',
        'religion',
        'township',
        'state',
        'nrc',
        'nrc2',
        'relation_to_user',
        'address',
        'phone',
        'work',
        'availability',
        'data'
    ];

    protected $casts = [
        'data' => 'array'
    ];

    //================ relation methods start ================

    public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //================ relation methods end ================


    //================ mutator start ================

    public function getStateStringAttribute($value)
    {
        $states = config('constants.states');
        $index = extract_value_from_array('state', $this->attributes);
        if ($index) {
            return $states[$this->attributes['state']];
        } else {
            return 'Not Provided';
        }
    }

    public function getAvailabilityStringAttribute($value)
    {
//        $value = $this->attributes['availability'];
        $value = extract_value_from_array('availability', $this->attributes);
        if ($value) {
            switch ($value) {
                case 0:
                    return 'မရှိ';
                case 1:
                    return 'သက်ရှိထင်ရှားရှိ';
                case 2:
                    return 'ကွယ်လွန်';
            }
        } else {
            return '-';
        }
    }

    public function getNrcStringAttribute($value){
        return 'o';
    }

    public function setRelationToUserAttribute($value)
    {
        $value = strtolower($value);
        $this->attributes['relation_to_user'] = $value;
    }

    public function setAvailabilityAttribute($value)
    {
        if ($value === 'on') {
            $value = 1;
        } elseif ($value === 'off') {
            $value = 2;
        }
        $this->attributes['availability'] = $value;
    }

//    public function get


    //================ mutator end ================

}

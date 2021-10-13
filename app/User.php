<?php

namespace App;

use App\Model\Supporter;
use App\Models\Acceptance;
use App\Models\AppliedCourse;
use App\Models\Blacklist;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\ExamRecord;
use App\Models\Fine;
use App\Models\Form;
use App\Models\HighSchool;
use App\Models\Invoice;
use App\Models\ParentDetail;
use App\Models\Scholarship;
use App\Models\StudentDetail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function studentDetails()
    {
        return $this->hasOne(StudentDetail::class, 'user_id');
    }

    public function highSchools()
    {
        return $this->hasOne(HighSchool::class);
    }

    public function scholarships()
    {
        return $this->hasMany(Scholarship::class);
    }

    public function parentDetails()
    {
        return $this->hasMany(ParentDetail::class, 'user_id');
    }

    public function siblings()
    {
        return $this->hasMany(Sibling::class);
    }

    public function examRecords()
    {
        return $this->hasMany(ExamRecord::class, 'user_id');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'user_id');
    }

    public function appliedCourses()
    {
        return $this->hasMany(AppliedCourse::class);
    }

    public function courses()
    {
        return $this->belongsToMany(
            Course::class,
            'applied_courses',
            'user_id',
            'course_id');
    }

    public function supporters()
    {
        return $this->hasOne(Supporter::class, 'user_id');
    }


    public function paidForms()
    {
        //only for finance
        return $this->hasMany(Form::class, 'payment_receive_user_id');
    }

    public function appliedForms()
    {
        return $this->hasMany(Form::class, 'applied_user_id');
    }

    public function approvedForms()
    {
        return $this->hasMany(Form::class, 'approved_user_id');
    }

    public function fines()
    {
        return $this->belongsToMany(Fine::class, 'user_fine', 'user_id', 'fine_id')
            ->withPivot(['amount', 'remark']);
    }

    public function issuedFines()
    {
        return $this->belongsToMany(Fine::class, 'user_fine', 'issued_user_id', 'fine_id')
            ->withPivot(['amount', 'remark']);
    }

    public function receivedInvoices()
    {
        return $this->hasMany(Invoice::class, 'payment_received_user_id');
    }

    public function blacklists()
    {
        return $this->hasMany(Blacklist::class);
    }

    public function liftedBans()
    {
        return $this->hasMany(Blacklist::class, 'lifted_user_id', 'id');
    }
}

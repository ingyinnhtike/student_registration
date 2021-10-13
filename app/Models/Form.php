<?php

namespace App\Models;

use App\Models\Traits\ApprovableForm;
use App\Models\Traits\PayableForm;
use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Holder for submitted form data
 * Class Form
 * @package App\Models
 */
class Form extends Model
{
    use PayableForm;
    use ApprovableForm;

    protected $fillable = [
        'approved_message',
        'approved_status',

        'payment_receive_status',
        'payment_receive_message',

        'form_type_id',
        'data',

        'university_status'
    ];

    protected $casts = [
        'data' => 'array',
    ];

    protected $dates = [
        'approved_at',
        'payment_received_at'
    ];


    public function appliedUser()
    {
        return $this->belongsTo(User::class, 'applied_user_id');
    }

    
    public function approvedUser()
    {
        return $this->belongsTo(User::class, 'approved_user_id');
    }

    public function paymentReceivedUser()
    {
        return $this->belongsTo(User::class, 'payment_receive_user_id');
    }

    public function type()
    {
        return $this->belongsTo(FormType::class, 'form_type_id');
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
}

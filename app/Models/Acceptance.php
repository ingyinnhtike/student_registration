<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Acceptance extends Model
{
    protected $fillable = [
        'enrollment_id',

        'approved_message',
        'approved_status',

        'payment_receive_status',
        'payment_receive_message'

    ];
    protected $dates =[
        'approved_at',
        'payment_received_at'
    ];

    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class);
    }

    public function approvedUser()
    {
        return $this->belongsTo(User::class, 'approved_user_id');
    }

    public function paymentReceivedUser()
    {
        return $this->belongsTo(User::class, 'payment_receive_user_id');
    }
}

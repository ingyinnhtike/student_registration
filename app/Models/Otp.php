<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    protected $fillable = [
        'otp',
        'phone',
        'response',
        'expired_at',
    ];

    protected $casts = [
        'response' => 'array'
    ];

    protected $dates = [
        'expired_at'
    ];
}

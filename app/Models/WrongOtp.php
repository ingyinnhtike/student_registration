<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WrongOtp extends Model
{
    protected $fillable = [
        'ip_address',
        'phone',
        'wrong_code'
    ];


}

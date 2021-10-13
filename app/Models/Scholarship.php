<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    protected $fillable = [
        'name',
        'organization',
        'amount',
        'data'
    ];

    protected $casts = [
        'data'=>'array'
    ];

    public function student()
    {
        return $this->belongsTo(User::class);
    }
}

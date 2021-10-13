<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Blacklist extends Model
{
    protected $fillable = [
        'user_id',
        'phone',
        'ip_address',
        'until_at'
    ];

    protected $dates = [
        'until_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function liftedUser()
    {
        return $this->belongsTo(User::class, 'lifted_user_id', 'id');
    }
}

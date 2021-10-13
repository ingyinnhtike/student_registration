<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Fine extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    public function students()
    {
        return $this->belongsToMany(User::class, 'user_fine', 'fine_id', 'user_id')
            ->withPivot(['amount', 'remark']);
    }

    public function issuedUsers()
    {
        return $this->belongsToMany(User::class, 'user_fine', 'fine_id', 'issued_user_id')
            ->withPivot(['amount', 'remark']);
    }

}

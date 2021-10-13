<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'form_id',
        'payment_received_status',
        'payment_received_message',
        'payment_received_at',
        'data'
    ];

    protected $dates = [
        'payment_received_at',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}

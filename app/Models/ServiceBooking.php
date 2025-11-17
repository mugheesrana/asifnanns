<?php 
// app/Models/ServiceBooking.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceBooking extends Model
{
    protected $fillable = [
        'service_id',
        'name',
        'email',
        'phone',
        'subject',
        'preferred_date',
        'service_type',
        'message',
        'attachment',
        'status',
    ];

    protected $casts = [
        'preferred_date' => 'date',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}

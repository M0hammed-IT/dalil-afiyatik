<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    // الحقول المسموح نعبيها
    protected $fillable = [
        'user_id',
        'doctor_id',
        'appointment_date',
        'queue_number',
        'status',
        'patient_phone', 
        'tracking_token', 
    ];

    // الحجز يتبع لمريض
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // الحجز يتبع لطبيب
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
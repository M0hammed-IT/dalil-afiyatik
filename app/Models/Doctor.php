<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name', 'specialty_id', 'degree', 'experience_years', 
        'bio', 'location', 'consultation_fee', 'phone', 
        'whatsapp', 'image', 'rating'
    ];

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }
    // علاقة: الطبيب يمتلك عدة تقييمات
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // 🔥 دالة ذكية للمساعد الشخصي: تحسب متوسط التقييم من 5
    public function averageRating()
    {
        // إذا عنده تقييمات يجيب المعدل، وإذا ما عنده يرجع 0
        return round($this->reviews()->avg('rating'), 1) ?: 0;
    }
    // الطبيب عنده مجموعة حجوزات
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
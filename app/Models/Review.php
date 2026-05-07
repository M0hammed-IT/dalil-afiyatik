<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // الحقول المسموح نرسل إلها بيانات
    protected $fillable = ['doctor_id', 'user_id', 'ip_address', 'guest_name', 'rating', 'comment'];

    // علاقة: التقييم ينتمي لمريض (مستخدم) معين
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // علاقة: التقييم ينتمي لطبيب معين
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
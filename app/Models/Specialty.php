<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    use HasFactory;

    // 1. إيقاف إضافة الأوقات التلقائية (هذا يحل الإيرور)
    public $timestamps = false;

    // 2. السماح بإدخال اسم التخصص من الكود
    protected $fillable = ['name'];

    // 3. علاقة التخصص بالأطباء (التخصص الواحد يمتلك عدة أطباء)
    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}
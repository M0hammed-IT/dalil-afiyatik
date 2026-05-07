<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('doctors', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->foreignId('specialty_id')->constrained('specialties')->onDelete('cascade');
        $table->string('degree'); // الشهادة (بورد، دكتوراه، الخ)
        $table->integer('experience_years'); // سنوات الخدمة
        $table->text('bio'); // نبذة عن الطبيب
        $table->string('location'); // عنوان العيادة
        $table->decimal('consultation_fee', 10, 2); // سعر الكشفية
        $table->string('phone'); // رقم العيادة
        $table->string('whatsapp'); // رقم الواتساب للحجز
        $table->string('image')->nullable(); // صورة الطبيب
        $table->decimal('rating', 2, 1)->default(5.0); // التقييم
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};

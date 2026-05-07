<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            // إضافة رقم هاتف المريض (نحتاجه حتى يتابع دوره)
            $table->string('patient_phone')->nullable()->after('status');
            // إضافة حقل للرابط السري (للاحتياط إذا ردنا نفعله مستقبلاً)
            $table->string('tracking_token')->unique()->nullable()->after('patient_phone');
        });
    }

    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropColumn(['patient_phone', 'tracking_token']);
        });
    }
};
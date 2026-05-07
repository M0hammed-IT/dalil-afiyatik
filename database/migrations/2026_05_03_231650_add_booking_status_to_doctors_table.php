<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('doctors', function (Blueprint $table) {
            // إضافة حقل يحدد إذا الطبيب يستقبل حجوزات لو قبط (افتراضياً true يعني يستقبل)
            $table->boolean('is_accepting_bookings')->default(true)->after('consultation_fee');
        });
    }

    public function down(): void
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->dropColumn('is_accepting_bookings');
        });
    }
};
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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            
            // 1. المريض اللي كتب التقييم
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // 2. الطبيب المُقيَّم
            $table->foreignId('doctor_id')->constrained()->onDelete('cascade');
            
            // 3. التقييم بالنجوم (من 1 إلى 5)
            $table->tinyInteger('rating'); 
            
            // 4. التعليق النصي للمريض (خليناه nullable لأن ممكن يقيم بس نجوم بدون ما يكتب رسالة)
            $table->text('comment')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
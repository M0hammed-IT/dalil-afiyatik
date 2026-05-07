<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('news', function (Blueprint $table) {
        $table->id();
        $table->string('title'); // عنوان الخبر
        $table->string('category'); // تصنيف الخبر (أخبار مستشفيات، نصائح، الخ)
        $table->text('content'); // تفاصيل الخبر
        $table->string('image')->nullable(); // صورة الخبر
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};

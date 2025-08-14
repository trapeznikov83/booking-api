<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('booking_objects', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Название объекта бронирования
            $table->text('description')->nullable(); // Описание
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('booking_objects');
    }
};

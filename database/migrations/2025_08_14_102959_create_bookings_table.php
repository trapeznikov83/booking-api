<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Ссылка на пользователя
            $table->foreignId('booking_object_id')->constrained()->onDelete('cascade'); // Ссылка на объект бронирования
            $table->dateTime('start_at'); // Время начала брони
            $table->dateTime('end_at');   // Время окончания брони
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('bookings');
    }
};

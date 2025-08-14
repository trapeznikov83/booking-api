<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingObjectController;
use App\Http\Controllers\BookingController;

Route::apiResource('rooms', RoomController::class)->middleware('auth:sanctum');// Регистрация API-маршрутов для бронирований

// Открытые маршруты (без токена)
Route::post('/register', [AuthController::class, 'register']); // Регистрация
Route::post('/login', [AuthController::class, 'login']);       // Авторизация

// Группа маршрутов, защищенных Sanctum (требуют токен)
Route::middleware('auth:sanctum')->group(function () {

    // Выход пользователя (удаление токена)
    Route::post('/logout', [AuthController::class, 'logout']);

    // Просмотр объектов бронирования
    Route::get('/booking-objects', [BookingObjectController::class, 'index']);
    // Создать объект
    Route::post('booking-objects', [BookingObjectController::class, 'store']);


    // CRUD бронирований
    Route::get('/bookings', [BookingController::class, 'index']);           // Мои брони
    Route::post('/bookings', [BookingController::class, 'store']);          // Создать бронь
    Route::put('/bookings/{id}', [BookingController::class, 'update']);     // Изменить бронь
    Route::delete('/bookings/{id}', [BookingController::class, 'destroy']); // Удалить бронь
});

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    // Получить все бронирования текущего пользователя
    public function index(Request $request)
    {
        $user = $request->user();
        $bookings = Booking::where('user_id', $user->id)->get();

        return response()->json($bookings);
    }

    // Создать новое бронирование
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|string|max:10',
        ]);

        $user = $request->user();

        $booking = Booking::create([
            'user_id' => $user->id,
            'title' => $request->title,
            'date' => $request->date,
            'time' => $request->time,
        ]);

        return response()->json($booking, 201);
    }

    // Получить одно бронирование по ID
    public function show(Request $request, $id)
    {
        $user = $request->user();
        $booking = Booking::where('user_id', $user->id)->find($id);

        if (!$booking) {
            return response()->json(['error' => 'Booking not found'], 404);
        }

        return response()->json($booking);
    }

    // Обновить бронирование
    public function update(Request $request, $id)
    {
        $user = $request->user();
        $booking = Booking::where('user_id', $user->id)->find($id);

        if (!$booking) {
            return response()->json(['error' => 'Booking not found'], 404);
        }

        $request->validate([
            'title' => 'sometimes|string|max:255',
            'date' => 'sometimes|date',
            'time' => 'sometimes|string|max:10',
        ]);

        $booking->update($request->only(['title', 'date', 'time']));

        return response()->json($booking);
    }

    // Удалить бронирование
    public function destroy(Request $request, $id)
    {
        $user = $request->user();
        $booking = Booking::where('user_id', $user->id)->find($id);

        if (!$booking) {
            return response()->json(['error' => 'Booking not found'], 404);
        }

        $booking->delete();

        return response()->json(['message' => 'Booking deleted']);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name',
        'description',
        'capacity',
        'is_available',
    ];

    // Опционально: связь с бронированиями
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'booking_object_id');
    }
}

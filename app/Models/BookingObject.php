<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingObject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'jadwal_praktek_id',
        'status_booking_id',
        'user_id',
        'tanggal',
        'jam',
        'keluhan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function status_booking()
    {
        return $this->belongsTo(StatusBooking::class);
    }
    public function jadwal_praktek()
    {
        return $this->belongsTo(JadwalPraktek::class);
    }
}

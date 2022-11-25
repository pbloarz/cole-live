<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'beds',
        'formiture',
        'services',
        'image',
        'status',
        'prices_id',
        'hotels_id',
        'users_id',
    ];


    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function price()
    {
        return $this->belongsTo(Price::class);
    }
    public function guests()
    {
        return $this->hasMany(Guest::class);
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}

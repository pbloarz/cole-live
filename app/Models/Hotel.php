<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room;


class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'nit',
        'direccion',
        'cel_phone',
        'descripcion',
        'image',
        'open',
        'close',
        'facebook_url',
        'whatsapp',
        'users_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}

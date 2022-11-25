<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $fillable = [
        'coin_type',
        'price'
    ];
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}

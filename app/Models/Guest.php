<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;
    protected $fillable = [

        'name',
        'document_type',
        'direccion',
        'phobne',
        'email',
        'rooms_id',

    ];


    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function accounts()
    {
        return $this->hasMany(Account::class);
    }
}

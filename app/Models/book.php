<?php

namespace App\Models;

use Faker\Provider\UserAgent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class book extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'author',      
        'imagen',
        'description',
    ];

    public function reserv()
    {
        return $this->hasMany(reservation::class);
    }
}

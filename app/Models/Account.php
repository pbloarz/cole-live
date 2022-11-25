<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = ['article','price','guests_id'];
    public function guest(){
        return $this->belongsTo(Account::class);
    }
}

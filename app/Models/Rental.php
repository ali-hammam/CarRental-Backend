<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;
    protected $hidden = ['created_at', 'updated_at', 'car_id', 'user_id'];

    public function rental_payments(){
        return $this->hasMany(RentalPayment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function car(){
        return $this->belongsTo(Car::class);
    }
}

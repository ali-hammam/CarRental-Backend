<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalPayment extends Model
{
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at', 'rental_id'];

    public function rental(){
        return $this->belongsTo(Rental::class);
    }
}

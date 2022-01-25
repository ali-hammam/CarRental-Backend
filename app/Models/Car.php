<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'car_type_id',
        'branch_id',
        'color',
        'is_active',
        'maintenance',
        'hourly_price',
        'tax_rate'
    ];
    protected $hidden = ['created_at', 'updated_at', 'branch_id'];

    public function rentals(){
        return $this->hasMany(Rental::class);
    }

    public function carType(){
        return $this->belongsTo(CarType::class);
    }

    public function branch(){
        return $this->belongsTo(Branch::class);
    }
}

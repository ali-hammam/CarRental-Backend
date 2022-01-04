<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarType extends Model
{
    use HasFactory;
    protected $hidden = ['created_at', 'updated_at', 'manufacturer_id'];

    public function manufacturer(){
        return $this->belongsTo(Manufacturer::class);
    }

    public function cars(){
        return $this->hasMany(Car::class);
    }
}

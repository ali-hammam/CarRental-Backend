<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;
    protected $hidden = ['created_at', 'updated_at'];

    public function carTypes(){
        return $this->hasMany(CarType::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use WisdomDiala\Countrypkg\Models\State;

class Branch extends Model
{
    use HasFactory;
    protected  $primaryKey = 'id';

    protected $hidden = ['created_at', 'updated_at', 'agency_id', 'state_id'];

    public function cars(){
        return $this->hasMany(Car::class);
    }

    public function agency(){
        return $this->belongsTo(Agency::class);
    }

    public function state(){
        return $this->belongsTo(State::class, 'state_id');
    }
}

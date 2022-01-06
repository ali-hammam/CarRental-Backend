<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use WisdomDiala\Countrypkg\Models\State;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'fname',
        'mname',
        'lname',
        'ssn',
        'image',
        'email',
        'driver_licence',
        'password',
        'state_id',
        'type'
    ];

    protected $hidden = [
        'password',
    ];

    public function phoneNumber(){
        return $this->hasOne(PhoneNumber::class);
    }

    public function rentals(){
        return $this->hasMany(Rental::class);
    }

    public function state(){
        return $this->belongsTo(State::class);
    }

    public function agency(){
        return $this->hasOne(Agency::class);
    }
}

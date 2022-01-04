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
        'name',
        'email',
        'password',
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
}

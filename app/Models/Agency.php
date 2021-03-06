<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'user_id'];
    protected $hidden = ['user_id','created_at', 'updated_at'];

    public function branches(){
        return $this->hasMany(Branch::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function manufacturers(){
        return $this->hasMany(Manufacturer::class);
    }
}

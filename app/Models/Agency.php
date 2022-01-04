<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;
    protected $hidden = ['created_at', 'updated_at'];

    public function branches(){
        return $this->hasMany(Branch::class);
    }
}

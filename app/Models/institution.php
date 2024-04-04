<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class institution extends Model
{
    use HasFactory;
    public function Institution_assesment(){
        return $this->hasMany(Institution_assesment::class);
    }
    public function User(){
        return $this->hasOne(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cbe extends Model
{
    use HasFactory;
    //Relationship
    public function student_list(){
        return $this->hasMany(student_list::class,'cbe_id');
    }
    public function user(){
        return $this->hasMany(user::class,'id');
    }
    public function college (){
        return $this->hasMany(College::class,'coll_id');
    }
}

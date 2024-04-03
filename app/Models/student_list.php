<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_list extends Model
{
    use HasFactory;
    public function cbe(){
        return $this->belongsTo(cbe::class,'cbe_id');
    }
}

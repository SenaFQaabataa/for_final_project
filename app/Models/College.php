<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use HasFactory;
    public function cbe(){
        return $this->belongsTo(cbe::class,'coll_id');
    }
}

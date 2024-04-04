<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_trainings extends Model
{
    use HasFactory;
    //Relationship with supervisor
    public function Supervisor(){
        return $this->belongsTo(Supervisor::class);
    }
    public function Supervisor_assesment(){
        return $this->belongsToMany(Supervisor_assesment::class);
    }
    public function Institution_assessment()
    {
        return $this->belongsToMany(Institution_assesment::class);
    }
    public function Training_types(){
        return $this->hasOne(Training_types::class);
    }
    public function Student_training_responses()
    {
        return $this->belongsToMany(Student_training_responses::class);
    }



}

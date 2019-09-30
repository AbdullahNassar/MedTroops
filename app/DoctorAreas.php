<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorAreas extends Model
{
    protected $fillable = ['doctor_id','area_id'];

    public function doctors(){
        return $this->belongsTo(Doctor::class ,'doctor_id');
    }

    public function areas(){
        return $this->belongsTo(Area::class ,'area_id');
    }
}

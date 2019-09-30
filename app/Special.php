<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Special extends Model 
{
    protected $fillable = ['special_name','special_name_ar','content','content_ar','image','active'];

    public function doctors(){
        return $this->hasMany(Doctor::class ,'doctor_id');
    }

}

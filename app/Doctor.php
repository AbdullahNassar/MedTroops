<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = ['username','password','recover','doctor_name','doctor_name_ar','birth','age','specialty',
                           'address','address_ar','email','phone','active','image','price','wallet',
                           'rate','balance','bio','bio_ar','bank_acc_num','bank_name','bank_name_ar'];

    public function specials(){
        return $this->belongsTo(Special::class ,'specialty');
    }

    public function areas(){
        return $this->hasMany(DoctorAreas::class ,'doctor_id');
    }
}

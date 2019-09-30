<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = ['username','password','recover','patient_name','patient_name_ar','birth','age',
                           'gender','address','address_ar','email','phone','active','image','wallet',
                           'rate','bio','bio_ar','bank_acc_num','bank_name','bank_name_ar','facebook',
                           'twitter','linkedin','instagram'];

}

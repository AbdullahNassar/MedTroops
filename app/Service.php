<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name_en','name_ar','content_en','content_ar','image','active'];

}

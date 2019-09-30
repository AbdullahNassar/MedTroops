<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model{

    protected $fillable = ['image' ,'title_ar','title_en' ,'head_ar',
                           'head_en','content_ar','content_en','button_ar','button_en','url','active'];

}

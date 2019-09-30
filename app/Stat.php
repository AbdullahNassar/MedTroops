<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Stat extends Model
{
    protected $fillable = ['header_en' ,'header_ar' ,'f_head_en' ,'f_head_ar' ,'f_content_en' ,'f_content_ar',
                           'f_video','app_head_en','app_head_ar','android','ios','footer_en','footer_ar',
                           'about_head_en' ,'about_head_ar','about_content_en' ,'about_content_ar' ,
                           'about_image' ,'contact_en' ,'contact_ar'];

}

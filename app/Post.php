<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title_ar' ,'title_en','head_ar' ,'head_en' ,'content_ar','content_en' ,'active' ,'cat_id'];

    public function cat(){
        return $this->belongsTo(Cat::class ,'cat_id');
    }

}

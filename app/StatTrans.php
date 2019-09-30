<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatTrans extends Model
{
    //
    protected $fillable = ['services' ,'products' ,'footer' ,'blog' ,'contact_head' ,'contact_content','sub_head','sub_content','sub_button','meta_name','meta_desc','keywords','author' ,'lang' ,'static_id'];

    public function statics(){
        return $this->belongsTo(Stat::class ,'static_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactTrans extends Model
{
    //
    protected $fillable = ['address' ,'post' ,'work_time' ,'lang' ,'contact_id'];

    public function contact(){
        return $this->belongsTo(Contact::class ,'contact_id');
    }
}

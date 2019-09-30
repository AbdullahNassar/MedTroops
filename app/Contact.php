<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Contact extends Model
{
    protected $fillable = ['facebook' ,'twitter' ,'linkedin' ,'instagram' ,
                            'phone','email' ,'address_ar' ,'address_en'];

    public function get($value)
    {
        $contact = DB::table('contacts')
            ->select($value)
            ->first();

    if($contact)
        return $contact->$value;
    return '';
    }

}

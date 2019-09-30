<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Data extends Model
{
    public function get($value)
    {
        $data = DB::table('stats')
            ->select($value)
            ->first();

    if($data)
        return $data->$value;
    return '';
    }
}

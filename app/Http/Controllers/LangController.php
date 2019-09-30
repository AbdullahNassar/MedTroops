<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;


class LangController extends Controller {

    public function postIndex(Request $request,$locale) {        
        $request->session()->put('locale',$locale);
        return back();
    }
}

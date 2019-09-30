<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Facades\Input;
use Config;
use Session;
use Auth;
use Hash;
use DB;

class HomeController extends Controller{

    public function getIndex(Request $request) {
        return view('admin.pages.home.home');
    }

    public function error() {
        return view('admin.pages.error');
    }
}

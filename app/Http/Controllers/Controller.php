<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function error() {
        return view('admin.pages.error');
    }

    // public function search(Request $request) {
    //     if (Config::get('app.locale') == 'en'){
    //         $departments = Special::where('active', 1)->get();
    //         $data = new Data;
    //         $contact = new Contact;
    //         $address = $request->input('address');
    //         $doctor = $request->input('doctor');
    //         $doctors = Doctor::where('doctors.doctor_name', 'like', '%' . $doctor . '%')
    //                 ->where('doctors.address', 'like', '%' . $address . '%')->get();

    //         return view('site.pages.search.index', compact('departments','data','contact'));
    //     }elseif(Config::get('app.locale') == 'ar'){
    //         $departments = Special::where('active', 1)->get();
    //         $data = new Data;
    //         $contact = new Contact;
    //         $address = $request->input('address_ar');
    //         $doctor = $request->input('doctor_ar');
    //         $doctors = Doctor::where('doctors.doctor_name', 'like', '%' . $doctor . '%')
    //                 ->where('doctors.address', 'like', '%' . $address . '%')->get();

    //         return view('site.pages.search.index', compact('departments','data','contact'));
    //     }
    // }
}

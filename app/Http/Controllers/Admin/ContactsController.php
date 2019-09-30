<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\Contact;

class ContactsController extends Controller {

	public function getIndex() {
        $contact = Contact::find(1);
        return view('admin.pages.contact.index', compact('contact'));
    }

    function postdata(Request $request){
        $error_array = array();
        $success_output = '';
        if($request->get('button_action') == 'update'){
            $id = 1;
            $contact2 = Contact::find($id);

            $contact2->facebook = $request->facebook;
            $contact2->twitter = $request->twitter;
            $contact2->linkedin = $request->linkedin;
            $contact2->instagram = $request->instagram;
            $contact2->phone = $request->phone;
            $contact2->email = $request->email;
            $contact2->address_en = $request->address_en;
            $contact2->address_ar = $request->address_ar;
            
            if($contact2->save()){
                if (Config::get('app.locale') == 'en'){
                    $success_output = '<div class="alert alert-success">Data Updated Successfully</div>';
                }elseif(Config::get('app.locale') == 'en'){
                    $success_output = '<div class="alert alert-success">تم تحديث البيانات بنجاح</div>';
                }
            }
            $output = array(
                'error'     =>  $error_array,
                'success'   =>  $success_output
            );
            echo json_encode($output);
        }
    }
    
}

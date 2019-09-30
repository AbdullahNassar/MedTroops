<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Member;
use App\Patient;
use App\Data;
use App\Contact;
use Validator;
use Config;
use DB;
use Yajra\DataTables\Facades\DataTables;

class PatientsController extends Controller
{

    public function patientprofile($id) {
        $patient = Patient::find($id);
        $departments = Special::where('active', 1)->get();
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.patientprofile.index', compact('patient','departments','contact','data'));
    } 

    public function editpatient($id) {
        $patient = Patient::find($id);
        $departments = Special::where('active', 1)->get();
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.editpatient.index', compact('patient','departments','contact','data'));
    }

    function postdata(Request $request){
        $error_array = array();
        $success_output = '';
            $patient = Patient::find($request->input('patient_id'));
            $destination = storage_path('uploads/' . $request->storage);
            $image = $request->file('patient_image');
            if ($image != null) {
                if (is_file($destination . "/{$image}")) {
                    @unlink($destination . "/{$image}");
                }
                $imageName = $image->getClientOriginalName();
                $image->move($destination, $imageName);
                $patient->image = $imageName;
            }
            $patient->username = $request->username;
            $password2 = bcrypt($request->password);
            $patient->password = $password2;
            $patient->recover = $request->password;
            $patient->patient_name = $request->patient_name;
            $patient->patient_name_ar = $request->patient_name_ar;
            $patient->birth = $request->birth;
            $patient->age = Carbon::parse($request->birth)->age;
            $patient->phone = $request->phone;
            $patient->email = $request->email;
            $patient->gender = $request->gender;
            $patient->bank_acc_num = $request->bank_acc_num;
            $patient->bank_name = $request->bank_name;
            $patient->bank_name_ar = $request->bank_name_ar;
            $patient->address = $request->address;
            $patient->address_ar = $request->address_ar;
            $patient->bio = $request->bio;
            $patient->bio_ar = $request->bio_ar;
            $patient->wallet = $request->wallet;
            $patient->rate = $request->rate;
            $patient->facebook = $request->facebook;
            $patient->twitter = $request->twitter;
            $patient->linkedin = $request->linkedin;
            $patient->instagram = $request->instagram;
            $patient->active = 1;
            if($patient->save()){
                $password = bcrypt($request->password);
                $data = array('name_ar'=>$patient->patient_name_ar,'name_en'=>$patient->patient_name,'user_id'=>$patient->id,'username'=>$patient->username,'image'=>$patient->image
                              ,'password'=>$password,'recover'=>$request->password,'email'=>$request->email
                              ,'phone'=>$request->phone,'type'=>'patient');
                DB::table('members')->where('user_id',$patient->id)->update($data);
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

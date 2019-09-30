<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Member;
use App\Patient;
use Validator;
use Config;
use DB;
use Yajra\DataTables\Facades\DataTables;

class PatientsController extends Controller
{
    public function getIndex() {
        return view('admin.pages.patient.index');
    }

    public function getdata() {
        if (Config::get('app.locale') == 'en'){
            $patients = Patient::select('id','patient_name','email', 'phone','birth','wallet');
        }elseif(Config::get('app.locale') == 'ar'){
            $patients = Patient::select('id','patient_name_ar','email', 'phone','birth','wallet');
        }
        return Datatables::of($patients)
        ->addColumn('action', function($patient){
            return '<a href="#" class="text-primary edit" id="'.$patient->id.'"><i class="fa fa-edit"></i></a>     <a href="#" class="text-danger btndelet" id="'.$patient->id.'"><i class="fa fa-close"></i></a>     <a href="#" class="text-primary view" id="'.$patient->id.'"><i class="fa fa-eye"></i></a>';
        })
        ->addColumn('checkbox', '<input type="checkbox" name="patient_checkbox[]" class="patient_checkbox" value="{{$id}}" />')
        ->rawColumns(['checkbox','action'])
        ->make(true);
    }

    function fetchdata(Request $request){
        $id = $request->input('id');
        $patient = Patient::find($id);
        if($patient->gender == 1){
            $gender = "Male";
        }elseif($patient->gender == 0){
            $gender = "Female";
        }
        $output = array(
            'username' => $patient->username,
            'password' => $patient->recover,
            'patient_name' => $patient->patient_name,
            'patient_name_ar' => $patient->patient_name_ar,
            'birth' => $patient->birth,
            'gender' => $gender,
            'address'  => $patient->address,
            'address_ar'  => $patient->address_ar,
            'email' => $patient->email,
            'phone'  => $patient->phone,
            'active' => $patient->active,
            'image' => $patient->image,
            'wallet' => $patient->wallet,
            'rate' => $patient->rate,
            'bio' => $patient->bio,
            'bio_ar' => $patient->bio_ar,
            'bank_acc_num'  => $patient->bank_acc_num,
            'bank_name' => $patient->bank_name,
            'bank_name_ar' => $patient->bank_name_ar,
            'facebook' => $patient->facebook,
            'twitter' => $patient->twitter,
            'linkedin' => $patient->linkedin,
            'instagram' => $patient->instagram,
        );
        echo json_encode($output);
    }

    function postdata(Request $request){
        $error_array = array();
        $success_output = '';
        if($request->get('button_action') == 'update'){
            $patient2 = Patient::find($request->input('patient_id'));
            $destination2 = storage_path('uploads/' . $request->storage);
            $image2 = $request->file('patient_image');
            if ($image2 != null) {
                if (is_file($destination2 . "/{$image2}")) {
                    @unlink($destination2 . "/{$image2}");
                }
                $imageName = $image2->getClientOriginalName();
                $image2->move($destination2, $imageName);
                $patient2->image = $imageName;
            }
            $patient2->username = $request->username;
            $password2 = bcrypt($request->password);
            $patient2->password = $password2;
            $patient2->recover = $request->password;
            $patient2->patient_name = $request->patient_name;
            $patient2->patient_name_ar = $request->patient_name_ar;
            $patient2->birth = $request->birth;
            $patient2->age = Carbon::parse($request->birth)->age;
            $patient2->phone = $request->phone;
            $patient2->email = $request->email;
            $patient2->gender = $request->gender;
            $patient2->bank_acc_num = $request->bank_acc_num;
            $patient2->bank_name = $request->bank_name;
            $patient2->bank_name_ar = $request->bank_name_ar;
            $patient2->address = $request->address;
            $patient2->address_ar = $request->address_ar;
            $patient2->bio = $request->bio;
            $patient2->bio_ar = $request->bio_ar;
            $patient2->wallet = $request->wallet;
            $patient2->rate = $request->rate;
            $patient2->facebook = $request->facebook;
            $patient2->twitter = $request->twitter;
            $patient2->linkedin = $request->linkedin;
            $patient2->instagram = $request->instagram;
            if (isset($request->active)) {
                $patient2->active = 1;
            }else{
                $patient2->active = 0;
            }
            if($patient2->save()){
                $password = bcrypt($request->password);
                $data = array('name_ar'=>$patient2->patient_name_ar,'name_en'=>$patient2->patient_name,'user_id'=>$patient2->id,'username'=>$patient2->username,'image'=>$patient2->image
                              ,'password'=>$password,'recover'=>$request->password,'email'=>$request->email
                              ,'phone'=>$request->phone,'type'=>'patient');
                DB::table('members')->where('user_id',$patient2->id)->update($data);
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
        }elseif($request->get('button_action') == 'insert'){
            if (Config::get('app.locale') == 'en'){
                $validation = Validator::make($request->all(), [
                    'patient_image' => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
                    'username' => 'required|unique:patients|min:6|alpha_dash|alpha_num',
                    'password' => 'required',
                    'patient_name' => 'required',
                    'patient_name_ar' => 'required',
                    'birth' => 'required',
                    'gender' => 'required',
                    'phone' => 'required|unique:patients|regex:/(201)[0-9]{9}/',
                    'email' => 'required|email|unique:patients',
                    'bank_acc_num'  => 'required',
                    'bank_name' => 'required',
                    'bank_name_ar' => 'required',
                    'active' => 'required',
                    'address'  => 'required',
                    'bio' => 'required',
                    'bio_ar' => 'required',
                ],[
                    'patient_image.required' => 'Please Upload Image',
                    'patient_image.image' => 'Please upload image not video',
                    'patient_image.mimes' => 'Image type : jpeg,jpg,png,gif',
                    'patient_image.max' => 'Max Size 20 MB',
                    'username.required' => 'Please Enter UserName',
                    'password.required' => 'Please Enter Password',
                    'patient_name.required' => 'Please Enter patient Name in English',
                    'patient_name_ar.required' => 'Please Enter patient Name in Arabic',
                    'birth.required' => 'Please Enter Date Of Birth',
                    'gender.required' => 'Please Select Gender',
                    'phone.required' => 'Please Enter Phone',
                    'email.required' => 'Please Enter E-mail',
                    'email.unique' => 'Please Enter Another E-mail',
                    'email.email' => 'Please Enter A Valid E-mail',
                    'bank_acc_num.required' => 'Please Enter Bank Account Number',
                    'bank_name.required' => 'Please Enter Bank Name in English',
                    'bank_name_ar.required' => 'Please Enter Bank Name in Arabic',
                    'active.required' => 'Please Enter Activation Status',
                    'address.required' => 'Please Enter Address',
                    'bio.required' => 'Please Enter patient Bio in English',
                    'bio_ar.required' => 'Please Enter patient Bio in Arabic',
                ]);
            }elseif(Config::get('app.locale') == 'ar'){
                $validation = Validator::make($request->all(), [
                    'patient_image' => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
                    'username' => 'required|unique:patients|min:6|alpha_dash|alpha_num',
                    'password' => 'required',
                    'patient_name' => 'required',
                    'patient_name_ar' => 'required',
                    'gender' => 'required',
                    'phone' => 'required|unique:patients|regex:/(201)[0-9]{9}/',
                    'email' => 'required|email|unique:patients',
                    'bank_acc_num'  => 'required',
                    'bank_name' => 'required',
                    'bank_name_ar' => 'required',
                    'active' => 'required',
                    'address'  => 'required',
                    'bio' => 'required',
                    'bio_ar' => 'required',
                ],[
                    'patient_image.required' => 'Please Upload Image',
                    'patient_image.image' => 'Please upload image not video',
                    'patient_image.mimes' => 'Image type : jpeg,jpg,png,gif',
                    'patient_image.max' => 'Max Size 20 MB',
                    'username.required' => 'Please Enter UserName',
                    'password.required' => 'Please Enter Password',
                    'patient_name.required' => 'Please Enter patient Name in English',
                    'patient_name_ar.required' => 'Please Enter patient Name in Arabic',
                    'gender.required' => 'Please Select Gender',
                    'phone.required' => 'Please Enter Phone',
                    'email.required' => 'Please Enter E-mail',
                    'email.unique' => 'Please Enter Another E-mail',
                    'email.email' => 'Please Enter A Valid E-mail',
                    'bank_acc_num.required' => 'Please Enter Bank Account Number',
                    'bank_name.required' => 'Please Enter Bank Name in English',
                    'bank_name_ar.required' => 'Please Enter Bank Name in Arabic',
                    'active.required' => 'Please Enter Activation Status',
                    'address.required' => 'Please Enter Address',
                    'bio.required' => 'Please Enter patient Bio in English',
                    'bio_ar.required' => 'Please Enter patient Bio in Arabic',
                ]);
            }
            
            //dd($request->all());
            if ($validation->fails())
            {
                foreach ($validation->messages()->getMessages() as $field_name => $messages)
                {
                    $error_array[] = $messages; 
                }
            }
            else
            {
                $patient = new Patient;
                $destination = storage_path('uploads/' . $request->storage);
                $image = $request->file('patient_image');
                if($request->hasFile('patient_image')){
                    if (is_file($destination . "/{$image}")) {
                        @unlink($destination . "/{$image}");
                    }
                    $imageName = $image->getClientOriginalName();
                    $image->move($destination, $imageName);
                    $patient->image = $imageName;
                }else{
                    $patient->image = "1.jpg";
                }
                $patient->username = $request->username;
                $password = bcrypt($request->password);
                $patient->password = $password;
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
                if($request->active == "on"){
                    $patient->active = 1;
                }elseif(empty($request->active)){
                    $patient->active = 0;
                }
                
                if($patient->save()){
                    $member = new Member;
                    $member->username = $patient->username;
                    $member->name_ar = $patient->patient_name_ar;
                    $member->name_en = $patient->patient_name;
                    $member->user_id = $patient->id;
                    $member->image = $patient->image;
                    $password = bcrypt($request->password);
                    $member->password = $password;
                    $member->recover = $request->password;
                    $member->email = $request->email;
                    $member->phone = $request->phone;
                    $member->type = "patient";
                    $member->save();
                    if(Config::get('app.locale') == 'en'){
                        $success_output = '<div class="alert alert-success">Data Inserted Successfully</div>';
                    }elseif(Config::get('app.locale') == 'en'){
                        $success_output = '<div class="alert alert-success">تم ادخال البيانات بنجاح</div>';
                    }
                }
            }
            $output = array(
                'error'     =>  $error_array,
                'success'   =>  $success_output
            );
            echo json_encode($output);
        }
    }

    function removedata(Request $request){
        Member::where('user_id',$request->input('id'))->where('type','=','patient')->delete();
        $patient = Patient::find($request->input('id'));
        $patient->delete();
    }

    function massremove(Request $request)
    {
        $patient_id_array = $request->input('id');
        Member::whereIn('user_id',$patient_id_array)->where('type','=','patient')->delete();
        $patient = Patient::whereIn('id', $patient_id_array);
        $patient->delete();
    }

}

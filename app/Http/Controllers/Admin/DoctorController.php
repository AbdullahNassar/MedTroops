<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\DoctorAreas;
use App\Member;
use App\Doctor;
use App\Special;
use App\Area;
use Validator;
use Config;
use DB;
use Carbon;
use Yajra\DataTables\Facades\DataTables;

class DoctorController extends Controller
{
    public function getIndex() {
        return view('admin.pages.doctor.index');
    }

    public function getdata() {
        if (Config::get('app.locale') == 'en'){
            $doctors = Doctor::select('id','doctor_name','email', 'phone','price','wallet');
        }elseif(Config::get('app.locale') == 'ar'){
            $doctors = Doctor::select('id','doctor_name_ar','email', 'phone','price','wallet');
        }
        return Datatables::of($doctors)
        ->addColumn('action', function($doctor){
            return '<a href="#" class="text-primary edit" id="'.$doctor->id.'"><i class="fa fa-edit"></i></a>     <a href="#" class="text-danger btndelet" id="'.$doctor->id.'"><i class="fa fa-close"></i></a>     <a href="#" class="text-primary view" id="'.$doctor->id.'"><i class="fa fa-eye"></i></a>';
        })
        ->addColumn('checkbox', '<input type="checkbox" name="doctor_checkbox[]" class="doctor_checkbox" value="{{$id}}" />')
        ->rawColumns(['checkbox','action'])
        ->make(true);
    }

    function fetchdata(Request $request){
        $id = $request->input('id');
        $doctor = Doctor::find($id);
        $output = array(
            'username' => $doctor->username,
            'password' => $doctor->recover,
            'doctor_name' => $doctor->doctor_name,
            'doctor_name_ar' => $doctor->doctor_name_ar,
            'birth' => $doctor->birth,
            'specialty' => $doctor->specialty,
            'address'  => $doctor->address,
            'address_ar'  => $doctor->address_ar,
            'email' => $doctor->email,
            'phone'  => $doctor->phone,
            'active' => $doctor->active,
            'image' => $doctor->image,
            'price' => $doctor->price,
            'percent' => $doctor->percent,
            'wallet' => $doctor->wallet,
            'rate' => $doctor->rate,
            'balance' => $doctor->balance,
            'bio' => $doctor->bio,
            'bio_ar' => $doctor->bio_ar,
            'bank_acc_num'  => $doctor->bank_acc_num,
            'bank_name' => $doctor->bank_name,
            'bank_name_ar' => $doctor->bank_name_ar,
        );
        echo json_encode($output);
    }

    function special(){
        $specials = Special::get()->where('active','=',1);
        echo json_encode($specials);
    }

    function area(){
        $areas = Area::get()->where('active','=',1);
        echo json_encode($areas);
    }

    function doctorarea(Request $request){
        $id = $request->input('id');
        $doctorAreas = DB::table('doctor_areas')
                ->join('areas','areas.areas_id','=','doctor_areas.area_id')
                ->select('doctor_areas.*','areas.area_name')
                ->where("doctor_areas.doctor_id", $id)
                ->get();
        echo json_encode($doctorAreas);
    }

    function doctorspecial(Request $request){
        $id = $request->input('id');
        $doctorSpecials = DB::table('doctors')
                ->join('specials','doctors.specialty','=','specials.special_id')
                ->select('specials.*')
                ->where("doctors.id", $id)
                ->get();
        echo json_encode($doctorSpecials);
    }
    

    function postdata(Request $request){
        $error_array = array();
        $success_output = '';
        if($request->get('button_action') == 'update'){
            $doctor2 = Doctor::find($request->input('doctor_id'));
            $destination2 = storage_path('uploads/' . $request->storage);
            $image2 = $request->file('image');
            if ($image2 != null) {
                if (is_file($destination2 . "/{$image2}")) {
                    @unlink($destination2 . "/{$image2}");
                }
                $imageName = $image2->getClientOriginalName();
                $image2->move($destination2, $imageName);
                $doctor2->image = $imageName;
            }
            $doctor2->username = $request->username;
            $password2 = bcrypt($request->password);
            $doctor2->password = $password2;
            $doctor2->recover = $request->password;
            $doctor2->doctor_name = $request->doctor_name;
            $doctor2->doctor_name_ar = $request->doctor_name_ar;
            $doctor2->birth = $request->birth;
            $doctor2->age = Carbon::parse($request->birth)->age;
            $doctor2->phone = $request->phone;
            $doctor2->email = $request->email;
            $doctor2->price = $request->price;
            $doctor2->specialty = $request->specialty;
            $doctor2->bank_acc_num = $request->bank_acc_num;
            $doctor2->bank_name = $request->bank_name;
            $doctor2->bank_name_ar = $request->bank_name_ar;
            $doctor2->address = $request->address;
            $doctor2->address_ar = $request->address_ar;
            $doctor2->bio = $request->bio;
            $doctor2->bio_ar = $request->bio_ar;
            $doctor2->percent = $request->percent;
            $doctor2->balance = $request->balance;
            $doctor2->wallet = $request->wallet;
            $doctor2->rate = $request->rate;
            if (isset($request->active)) {
                $doctor2->active = 1;
            }else{
                $doctor2->active = 0;
            }
            
            if($doctor2->save()){
                DB::table('doctor_areas')->where('doctor_id','=', $doctor2->id)->delete();
                $areas = $request->input("area");
                if($areas != null){
                    foreach ($areas as $area) {
                        $doctorAreas = new DoctorAreas;
                        $doctorAreas->doctor_id = $doctor2->id;
                        $doctorAreas->area_id = $area;
                        $doctorAreas->save();
                    }
                }
                $password = bcrypt($request->password);
                $data = array('name_ar'=>$doctor2->doctor_name_ar,'name_en'=>$doctor2->doctor_name,'user_id'=>$doctor2->id,'username'=>$doctor2->username,'image'=>$doctor2->image
                              ,'password'=>$password,'recover'=>$request->password,'email'=>$request->email
                              ,'phone'=>$request->phone,'type'=>'doctor');
                DB::table('members')->where('user_id',$doctor2->id)->update($data);
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
                    'image' => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
                    'username' => 'required|unique:members|min:6|alpha_dash|alpha_num',
                    'password' => 'required',
                    'doctor_name' => 'required',
                    'doctor_name_ar' => 'required',
                    'birth' => 'required',
                    'specialty' => 'required',
                    'phone' => 'required|unique:doctors|regex:/(201)[0-9]{9}/',
                    'email' => 'required|email|unique:doctors',
                    'price' => 'required',
                    'bank_acc_num'  => 'required',
                    'bank_name' => 'required',
                    'bank_name_ar' => 'required',
                    'active' => 'required',
                    'address'  => 'required',
                    'area' => 'required',
                    'bio' => 'required',
                    'bio_ar' => 'required',
                ],[
                    'image.required' => 'Please Upload Image',
                    'image.image' => 'Please upload image not video',
                    'image.mimes' => 'Image type : jpeg,jpg,png,gif',
                    'image.max' => 'Max Size 20 MB',
                    'username.required' => 'Please Enter UserName',
                    'password.required' => 'Please Enter Password',
                    'doctor_name.required' => 'Please Enter Doctor Name in English',
                    'doctor_name_ar.required' => 'Please Enter Doctor Name in Arabic',
                    'birth.required' => 'Please Enter Date Of Birth',
                    'specialty.required' => 'Please Select Specialty',
                    'phone.required' => 'Please Enter Phone',
                    'email.required' => 'Please Enter E-mail',
                    'email.unique' => 'Please Enter Another E-mail',
                    'email.email' => 'Please Enter A Valid E-mail',
                    'price.required' => 'Please Enter Price',
                    'bank_acc_num.required' => 'Please Enter Bank Account Number',
                    'bank_name.required' => 'Please Enter Bank Name in English',
                    'bank_name_ar.required' => 'Please Enter Bank Name in Arabic',
                    'active.required' => 'Please Enter Activation Status',
                    'address.required' => 'Please Enter Address',
                    'area.required' => 'Please Select Served Areas',
                    'bio.required' => 'Please Enter Doctor Bio in English',
                    'bio_ar.required' => 'Please Enter Doctor Bio in Arabic',
                ]);
            }elseif(Config::get('app.locale') == 'ar'){
                $validation = Validator::make($request->all(), [
                    'image' => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
                    'username' => 'required|unique:members|min:6|alpha_dash|alpha_num',
                    'password' => 'required',
                    'doctor_name' => 'required',
                    'doctor_name_ar' => 'required',
                    'specialty' => 'required',
                    'phone' => 'required|unique:doctors|regex:/(201)[0-9]{9}/',
                    'email' => 'required|email|unique:doctors',
                    'price' => 'required',
                    'bank_acc_num'  => 'required',
                    'bank_name' => 'required',
                    'bank_name_ar' => 'required',
                    'active' => 'required',
                    'address'  => 'required',
                    'area' => 'required',
                    'bio' => 'required',
                    'bio_ar' => 'required',
                ],[
                    'image.required' => 'Please Upload Image',
                    'image.image' => 'Please upload image not video',
                    'image.mimes' => 'Image type : jpeg,jpg,png,gif',
                    'image.max' => 'Max Size 20 MB',
                    'username.required' => 'Please Enter UserName',
                    'password.required' => 'Please Enter Password',
                    'doctor_name.required' => 'Please Enter Doctor Name in English',
                    'doctor_name_ar.required' => 'Please Enter Doctor Name in Arabic',
                    'specialty.required' => 'Please Select Specialty',
                    'phone.required' => 'Please Enter Phone',
                    'email.required' => 'Please Enter E-mail',
                    'email.unique' => 'Please Enter Another E-mail',
                    'email.email' => 'Please Enter A Valid E-mail',
                    'price.required' => 'Please Enter Price',
                    'bank_acc_num.required' => 'Please Enter Bank Account Number',
                    'bank_name.required' => 'Please Enter Bank Name in English',
                    'bank_name_ar.required' => 'Please Enter Bank Name in Arabic',
                    'active.required' => 'Please Enter Activation Status',
                    'address.required' => 'Please Enter Address',
                    'area.required' => 'Please Select Served Areas',
                    'bio.required' => 'Please Enter Doctor Bio in English',
                    'bio_ar.required' => 'Please Enter Doctor Bio in Arabic',
                ]);
            }
            
            
            if ($validation->fails())
            {
                foreach ($validation->messages()->getMessages() as $field_name => $messages)
                {
                    $error_array[] = $messages; 
                }
            }
            else
            {
                $doctor = new Doctor;
                $destination = storage_path('uploads/' . $request->storage);
                $image = Input::File('image');
                if($image != null){
                    if (is_file($destination . "/{$image}")) {
                        @unlink($destination . "/{$image}");
                    }
                    $imageName = $image->getClientOriginalName();
                    $image->move($destination, $imageName);
                    $doctor->image = $imageName;
                }
                $doctor->username = $request->username;
                $password = bcrypt($request->password);
                $doctor->password = $password;
                $doctor->recover = $request->password;
                $doctor->doctor_name = $request->doctor_name;
                $doctor->doctor_name_ar = $request->doctor_name_ar;
                $doctor->birth = $request->birth;
                $doctor->age = Carbon::parse($request->birth)->age;
                $doctor->phone = $request->phone;
                $doctor->email = $request->email;
                $doctor->price = $request->price;
                $doctor->specialty = $request->specialty;
                $doctor->bank_acc_num = $request->bank_acc_num;
                $doctor->bank_name = $request->bank_name;
                $doctor->bank_name_ar = $request->bank_name_ar;
                $doctor->address = $request->address;
                $doctor->address_ar = $request->address_ar;
                $doctor->bio = $request->bio;
                $doctor->bio_ar = $request->bio_ar;
                $doctor->percent = $request->percent;
                $doctor->balance = $request->balance;
                $doctor->wallet = $request->wallet;
                $doctor->rate = $request->rate;
                if($request->active == "on"){
                    $doctor->active = 1;
                }elseif(empty($request->active)){
                    $doctor->active = 0;
                }
                
                if($doctor->save()){
                    $areas = $request->input("area");
                    if($areas != null){
                        foreach ($areas as $area) {
                            $doctorAreas = new DoctorAreas;
                            $doctorAreas->doctor_id = $doctor->id;
                            $doctorAreas->area_id = $area;
                            $doctorAreas->save();
                        }
                    }
                    $member = new Member;
                    $member->username = $doctor->username;
                    $member->name_ar = $doctor->doctor_name_ar;
                    $member->name_en = $doctor->doctor_name;
                    $member->user_id = $doctor->id;
                    $member->image = $doctor->image;
                    $password = bcrypt($request->password);
                    $member->password = $password;
                    $member->recover = $request->password;
                    $member->email = $request->email;
                    $member->phone = $request->phone;
                    $member->type = "doctor";
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
        DoctorAreas::where('doctor_id',$request->input('id'))->delete();
        Member::where('user_id',$request->input('id'))->where('type','=','doctor')->delete();
        $doctor = Doctor::find($request->input('id'));
        $doctor->delete();
    }

    function massremove(Request $request)
    {
        $doctor_id_array = $request->input('id');
        DoctorAreas::whereIn('doctor_id',$doctor_id_array)->delete();
        Member::whereIn('user_id',$doctor_id_array)->where('type','=','doctor')->delete();
        $doctor = Doctor::whereIn('id', $doctor_id_array);
        $doctor->delete();
    }

}

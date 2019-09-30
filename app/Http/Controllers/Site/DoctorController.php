<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\DoctorAreas;
use App\Member;
use App\Doctor;
use App\Special;
use App\Area;
use App\Data;
use App\Contact;
use Validator;
use Config;
use Carbon;
use DB;
use Yajra\DataTables\Facades\DataTables;

class DoctorController extends Controller
{

    public function bedoctor() {
        $departments = Special::where('active', 1)->get();
        $specials = Special::where('active', 1)->get();
        $areas = Area::where('active', 1)->get();
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.bedoctor.index', compact('departments','areas','specials','data','contact'));
    }
    
    public function doctorprofile($id) {
        $doctor = Doctor::find($id);
        $specialty_id = $doctor->specialty;
        $specialty = Special::where('special_id',$specialty_id)->get();
        $areas = Area::get()->where('active','=',1);
        $specials = Special::get()->where('active','=',1);
        $departments = Special::where('active', 1)->get();
        $data = new Data;
        $contact = new Contact;
        $doctorAreas = DB::table('doctor_areas')
                ->join('areas','areas.areas_id','=','doctor_areas.area_id')
                ->select('doctor_areas.*','areas.area_name')
                ->where("doctor_areas.doctor_id", $id)
                ->get();
        $doctorSpecials = DB::table('doctors')
                ->join('specials','doctors.specialty','=','specials.special_id')
                ->select('specials.*')
                ->where("doctors.id", $id)
                ->get();
        return view('site.pages.doctorprofile.index', compact('doctor','specialty','areas','specials','doctorAreas','doctorSpecials','departments','contact','data'));
    }

    public function doctor($id) {
        $doctor = Doctor::find($id);
        $specialty_id = $doctor->specialty;
        $specialty = Special::where('special_id',$specialty_id)->get();
        $departments = Special::where('active', 1)->get();
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.doctor.index', compact('doctor','specialty','departments','contact','data'));
    }

    public function search(Request $request) {
        if (Config::get('app.locale') == 'en'){
            $departments = Special::where('active', 1)->get();
            $data = new Data;
            $contact = new Contact;
            $type = $request->input('type');
            $address = $request->input('address');
            $special = $request->input('special');
            $doctor = $request->input('doctor');
            $doctors = DB::table('doctors')
                    ->join('specials','doctors.specialty','=','specials.special_id')
                    ->select('doctors.*')
                    ->where('doctors.doctor_name', 'like', '%' . $doctor . '%')
                    ->where('doctors.address', 'like', '%' . $address . '%')
                    ->where('doctors.specialty', '=', $special)
                    ->where('doctors.avail', '=', $type)
                    ->get();
            return view('site.pages.search.index', compact('doctors','departments','data','contact'));
        }elseif(Config::get('app.locale') == 'ar'){
            $departments = Special::where('active', 1)->get();
            $data = new Data;
            $contact = new Contact;
            $type = $request->input('type_ar');
            $address = $request->input('address_ar');
            $special = $request->input('special_ar');
            $doctor = $request->input('doctor_ar');
            $doctors = DB::table('doctors')
                    ->join('specials','doctors.specialty','=','specials.special_id')
                    ->select('doctors.*')
                    ->where('doctors.doctor_name_ar', 'like', '%' . $doctor . '%')
                    ->where('doctors.address_ar', 'like', '%' . $address . '%')
                    ->where('doctors.specialty', '=', $special)
                    ->where('doctors.avail', '=', $type)
                    ->get();
            return view('site.pages.search.index', compact('doctors','departments','data','contact'));
        }
    }

    public function editdoctor($id) {
        $doctor = Doctor::find($id);
        $areas = Area::get()->where('active','=',1);
        $specials = Special::get()->where('active','=',1);
        $doctorAreas = DB::table('doctor_areas')
                ->join('areas','areas.areas_id','=','doctor_areas.area_id')
                ->select('doctor_areas.*','areas.area_name')
                ->where("doctor_areas.doctor_id", $id)
                ->get();
        $doctorSpecials = DB::table('doctors')
                ->join('specials','doctors.specialty','=','specials.special_id')
                ->select('specials.*')
                ->where("doctors.id", $id)
                ->get();
        $departments = Special::where('active', 1)->get();
        $data = new Data;
        $contact = new Contact;
        return view('site.pages.editdoctor.index', compact('doctor','areas','specials','doctorAreas','doctorSpecials','departments','contact','data'));
    }
    

    function postbedoctor(Request $request){
        $error_array = array();
        $success_output = '';
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
                    'birth' => 'required',
                    'specialty' => 'required',
                    'phone' => 'required|unique:doctors|regex:/(201)[0-9]{9}/',
                    'email' => 'required|email|unique:doctors',
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
                $doctor->address = $request->address;
                $doctor->address_ar = $request->address_ar;
                $doctor->bio = $request->bio;
                $doctor->bio_ar = $request->bio_ar;
                $doctor->active = 0;
                
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
                        $success_output = '<div class="alert alert-success">Data Inserted Successfully <br> Wait for admin Approval</div>';
                    }elseif(Config::get('app.locale') == 'en'){
                        $success_output = '<div class="alert alert-success">تم ادخال البيانات بنجاح <br>  يرجى انتظار الموافقة على طلب الالتحاق</div>';
                    }
                }
            }
            $output = array(
                'error'     =>  $error_array,
                'success'   =>  $success_output
            );
            echo json_encode($output);
    }

    function editdata(Request $request){
        $error_array = array();
        $success_output = '';
            $doctor = Doctor::find($request->input('doctor_id'));
            $destination = storage_path('uploads/' . $request->storage);
            $image = $request->file('image');
            if ($image != null) {
                if (is_file($destination . "/{$image}")) {
                    @unlink($destination . "/{$image}");
                }
                $imageName = $image->getClientOriginalName();
                $image->move($destination, $imageName);
                $doctor->image = $imageName;
            }

            $destination = storage_path('uploads/cv');
            $cv = $request->file('cv');
            if ($cv != null) {
                if (is_file($destination . "/{$cv}")) {
                    @unlink($destination . "/{$cv}");
                }
                $imageName = $cv->getClientOriginalName();
                $cv->move($destination, $imageName);
                $doctor->cv = $imageName;
            }
            $doctor->username = $request->username;
            $password2 = bcrypt($request->password);
            $doctor->password = $password2;
            $doctor->recover = $request->password;
            $doctor->doctor_name = $request->doctor_name;
            $doctor->doctor_name_ar = $request->doctor_name_ar;
            $doctor->birth = $request->birth;
            $doctor->age = Carbon::parse($request->birth)->age;
            $doctor->phone = $request->phone;
            $doctor->email = $request->email;
            $doctor->specialty = $request->specialty;
            $doctor->address = $request->address;
            $doctor->address_ar = $request->address_ar;
            $doctor->bio = $request->bio;
            $doctor->bio_ar = $request->bio_ar;
            $doctor->active = 0;
            
            if($doctor->save()){
                DB::table('doctor_areas')->where('doctor_id','=', $doctor->id)->delete();
                $areas = $request->input("area");
                if($areas != null){
                    foreach ($areas as $area) {
                        $doctorAreas = new DoctorAreas;
                        $doctorAreas->doctor_id = $doctor->id;
                        $doctorAreas->area_id = $area;
                        $doctorAreas->save();
                    }
                }
                $password = bcrypt($request->password);
                $data = array('user_id'=>$doctor->id,'username'=>$doctor->username,'image'=>$doctor->image
                              ,'password'=>$password,'recover'=>$request->password,'email'=>$request->email
                              ,'phone'=>$request->phone,'type'=>'doctor');
                DB::table('members')->where('user_id',$doctor->id)->update($data);
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

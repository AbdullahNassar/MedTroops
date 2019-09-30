<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use Validator;
use Config;
use DB;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    public function getIndex() {
        return view('admin.pages.user.index');
    }

    public function getProfile() {
        $users = User::get()->where('active','=',1);
        return view('admin.pages.profile.index', compact('users'));
    }

    public function getdata() {
        $users = User::select('id','name','email', 'mobile','country','address');
        return Datatables::of($users)
        ->addColumn('action', function($user){
            return '<a href="#" class="text-primary edit" id="'.$user->id.'"><i class="fa fa-edit"></i></a>     <a href="#" class="text-danger btndelet" id="'.$user->id.'"><i class="fa fa-close"></i></a>     <a href="#" class="text-primary view" id="'.$user->id.'"><i class="fa fa-eye"></i></a>';
        })
        ->addColumn('checkbox', '<input type="checkbox" name="user_checkbox[]" class="user_checkbox" value="{{$id}}" />')
        ->rawColumns(['checkbox','action'])
        ->make(true);
    }

    function fetchdata(Request $request){
        $id = $request->input('id');
        $user = User::find($id);
        $output = array(
            'username' => $user->username,
            'password' => $user->recover,
            'name' => $user->name,
            'type' => $user->type,
            'address'  => $user->address,
            'email' => $user->email,
            'mobile'  => $user->mobile,
            'active' => $user->active,
            'image' => $user->image,
            'country' => $user->country,
            'about' => $user->about,
            'facebook' => $user->facebook,
            'twitter' => $user->twitter,
            'linkedin' => $user->linkedin,
            'instagram' => $user->instagram,
        );
        echo json_encode($output);
    }

    function postdata(Request $request){
        $error_array = array();
        $success_output = '';
        if($request->get('button_action') == 'update'){
            $user2 = User::find($request->input('user_id'));
            $destination2 = storage_path('uploads/' . $request->storage);
            $image2 = $request->file('user_image');
            if ($image2 != null) {
                if (is_file($destination2 . "/{$image2}")) {
                    @unlink($destination2 . "/{$image2}");
                }
                $imageName = $image2->getClientOriginalName();
                $image2->move($destination2, $imageName);
                $user2->image = $imageName;
            }
            $user2->username = $request->username;
            $password2 = bcrypt($request->password);
            $user2->password = $password2;
            $user2->recover = $request->password;
            $user2->name = $request->name;
            $user2->type = $request->type;
            $user2->mobile = $request->mobile;
            $user2->email = $request->email;
            $user2->website = $request->website;
            $user2->about = $request->about;
            $user2->country = $request->country;
            $user2->address = $request->address;
            $user2->facebook = $request->facebook;
            $user2->twitter = $request->twitter;
            $user2->linkedin = $request->linkedin;
            $user2->instagram = $request->instagram;
            if (isset($request->active)) {
                $user2->active = 1;
            }else{
                $user2->active = 0;
            }
            
            if($user2->save()){
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
                $validation = Validator::make($request->all(), [
                    'user_image' => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
                    'username' => 'required|unique:members|min:6|alpha_dash|alpha_num',
                    'password' => 'required',
                    'name' => 'required',
                    'type' => 'required',
                    'address'  => 'required',
                    'email' => 'required|email|unique:users',
                    'mobile'  => 'required|unique:users|regex:/(201)[0-9]{9}/',
                    'country' => 'required',
                    'about' => 'required',
                ],[
                    'user_image.required' => 'Please Upload Image',
                    'user_image.image' => 'Please upload image not video',
                    'user_image.mimes' => 'Image type : jpeg,jpg,png,gif',
                    'user_image.max' => 'Max Size 20 MB',
                    'username.required' => 'Please Enter UserName',
                    'password.required' => 'Please Enter Password',
                    'name.required' => 'Please Enter User Name',
                    'type.required' => 'Please Enter User Type',
                    'gender.required' => 'Please Select Gender',
                    'mobile.required' => 'Please Enter Phone Number',
                    'mobile.unique' => 'Please Enter Another Phone Number',
                    'mobile.regex' => 'Please Enter A Valid Phone Number',
                    'email.required' => 'Please Enter E-mail',
                    'email.unique' => 'Please Enter Another E-mail',
                    'email.email' => 'Please Enter A Valid E-mail',
                    'country.required' => 'Please Enter User Country',
                    'address.required' => 'Please Enter Address',
                    'about.required' => 'Please Enter user Bio',
                ]);
            
            if ($validation->fails())
            {
                foreach ($validation->messages()->getMessages() as $field_name => $messages)
                {
                    $error_array[] = $messages; 
                }
            }
            else
            {
                $user = new User;
                $destination = storage_path('uploads/' . $request->storage);
                $image = $request->file('user_image');
                if($request->hasFile('user_image')){
                    if (is_file($destination . "/{$image}")) {
                        @unlink($destination . "/{$image}");
                    }
                    $imageName = $image->getClientOriginalName();
                    $image->move($destination, $imageName);
                    $user->image = $imageName;
                }else{
                    $user->image = "1.jpg";
                }
                $user->username = $request->username;
                $password = bcrypt($request->password);
                $user->password = $password;
                $user->recover = $request->password;
                $user->name = $request->name;
                $user->type = $request->type;
                $user->mobile = $request->mobile;
                $user->email = $request->email;
                $user->website = $request->website;
                $user->about = $request->about;
                $user->country = $request->country;
                $user->address = $request->address;
                $user->facebook = $request->facebook;
                $user->twitter = $request->twitter;
                $user->linkedin = $request->linkedin;
                $user->instagram = $request->instagram;
                if($request->active == "on"){
                    $user->active = 1;
                }elseif(empty($request->active)){
                    $user->active = 0;
                }
                
                if($user->save()){
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
        $user = User::find($request->input('id'));
        $user->delete();
    }

    function massremove(Request $request)
    {
        $user_id_array = $request->input('id');
        $user = User::whereIn('id', $user_id_array);
        $user->delete();
    }

}

<?php

namespace App\Http\Controllers\Site\Auth;

use App\Member;
use App\Doctor;
use App\Patient;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Mail;

class AuthController extends Controller {

    public function __construct(Request $request) {
        $this->middleware('guest.site', ['except' => ['logout', 'getLogout']]);
    }

    public function getIndex() {
        return view('site.auth.login');
    }

    public function postLogin(Request $r) {
        $return = [
            'status' => 'success',
            'message' => 'Login Success!',
            'url' => route('site.home')
        ];
        $name = $r->input('username');
        $password = $r->input('password');
        $admin = Member::where('username', $name)->orWhere('email', $name)->first();
        if ($admin && Hash::check($password, $admin->password)) {
            Auth::guard('members')->login($admin, $r->has('remember'));
        } else {
            $return = [
                'response' => 'error',
                'message' => 'Login Failed!'
            ];
        }
        return response()->json($return);
    }

    public function register(Request $request) {
        if(isset($request->type)){
            if($request->type == "doctor"){
                $doctor = new Doctor;
                $doctor->username = $request->username;
                $password = bcrypt($request->password);
                $doctor->password = $password;
                $doctor->recover = $request->password;
                $doctor->email = $request->email;
                if($doctor->save()){
                    $member = new Member;
                    $member->username = $doctor->username;
                    $member->user_id = $doctor->id;
                    $password = bcrypt($request->password);
                    $member->password = $password;
                    $member->recover = $request->password;
                    $member->email = $request->email;
                    $member->type = "doctor";
                    $member->save();
                    return redirect()->route('site.editdoctor', ['id' => $doctor->id]);
                }
            }elseif($request->type == "patient"){
                $patient = new Patient;
                $patient->username = $request->username;
                $password = bcrypt($request->password);
                $patient->password = $password;
                $patient->recover = $request->password;
                $patient->email = $request->email;
                if($patient->save()){
                    $member = new Member;
                    $member->username = $patient->username;
                    $member->user_id = $patient->id;
                    $password = bcrypt($request->password);
                    $member->password = $password;
                    $member->recover = $request->password;
                    $member->email = $request->email;
                    $member->type = "patient";
                    $member->save();
                    Auth::guard('members')->login($member, $request->has('remember'));
                    return redirect()->route('site.editpatient', ['id' => $patient->id]);
                }
            }
        }
    }


    public function logout() {
        Auth::guard('members')->logout();
        return redirect()->route('site.home');
    }

}

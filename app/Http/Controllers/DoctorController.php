<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Doctor;
use Validator;
use Yajra\DataTables\Facades\DataTables;

class DoctorController extends Controller
{
    public function getIndex() {
        return view('doctors');
    }

    public function getdata() {
        $doctors = Doctor::select('id','email', 'phone');
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
            'email'    =>  $doctor->email,
            'phone'     =>  $doctor->phone
        );
        echo json_encode($output);
    }

    function postdata(Request $request){
        $validation = Validator::make($request->all(), [
            'email' => 'required',
            'phone'  => 'required',
        ]);
        
        $error_array = array();
        $success_output = '';
        if ($validation->fails())
        {
            foreach ($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages; 
            }
        }
        else
        {
            if($request->get('button_action') == 'insert')
            {
                $doctor = new Doctor([
                    'email'    =>  $request->get('email'),
                    'phone'     =>  $request->get('phone')
                ]);
                $doctor->save();
                $success_output = '<div class="alert alert-success">Data Inserted</div>';
            }

            if($request->get('button_action') == 'update')
            {
                $doctor = Doctor::find($request->get('doctor_id'));
                $doctor->email = $request->get('email');
                $doctor->phone = $request->get('phone');
                $doctor->save();
                $success_output = '<div class="alert alert-success">Data Updated</div>';
            }
            
        }
        
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }

    function removedata(Request $request){
        $doctor = Doctor::find($request->input('id'));
        $doctor->delete();
    }

    function massremove(Request $request)
    {
        $doctor_id_array = $request->input('id');
        $doctor = Doctor::whereIn('id', $doctor_id_array);
        $doctor->delete();
    }

}

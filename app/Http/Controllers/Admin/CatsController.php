<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Cat;
use DB;
use Validator;
use Config;
use Yajra\DataTables\Facades\DataTables;

class CatsController extends Controller
{
    public function getIndex() {
        return view('admin.pages.cat.index');
    }

    public function getdata() {
        if (Config::get('app.locale') == 'en'){
            $cats = Cat::select('cat_id','name_en');
        }elseif(Config::get('app.locale') == 'ar'){
            $cats = Cat::select('cat_id','name_ar');
        }
        return Datatables::of($cats)
        ->addColumn('action', function($cat){
            return '<a href="#" class="text-primary edit" id="'.$cat->cat_id.'"><i class="fa fa-edit"></i></a>     <a href="#" class="text-danger btndelet" id="'.$cat->cat_id.'"><i class="fa fa-close"></i></a>';
        })
        ->addColumn('checkbox', '<input type="checkbox" name="cat_checkbox[]" class="cat_checkbox" value="{{$cat_id}}" />')
        ->rawColumns(['checkbox','action'])
        ->make(true);
    }

    function fetchdata(Request $request){
        $id = $request->input('id');
        $cats = DB::table('cats')->select('cats.*')->where('cat_id','=',$id)->get();
        echo json_encode($cats);
    }
    
    function postdata(Request $request){
        $error_array = array();
        $success_output = '';
        if($request->get('button_action') == 'update'){
            $id = $request->input('cat_id');
            $name_en = $request->input('name_en');
            $name_ar = $request->input('name_ar');
            if (isset($request->active)) {
                $active = 1;
                $data = array('name_en' => $name_en,'name_ar' => $name_ar,
                          'active' => $active);

                $cat2 = DB::table('cats')
                        ->where('cat_id','=',$id)->update($data);            
                
                if($cat2){
                    if (Config::get('app.locale') == 'en'){
                        $success_output = '<div class="alert alert-success">Data Updated Successfully</div>';
                    }elseif(Config::get('app.locale') == 'en'){
                        $success_output = '<div class="alert alert-success">تم تحديث البيانات بنجاح</div>';
                    }
                }
            }else{
                $active = 0;
                $data = array('name_en' => $name_en,'name_ar' => $name_ar,
                          'active' => $active);

                $cat2 = DB::table('cats')
                        ->where('cat_id','=',$id)->update($data);            
                
                if($cat2){
                    if (Config::get('app.locale') == 'en'){
                        $success_output = '<div class="alert alert-success">Data Updated Successfully</div>';
                    }elseif(Config::get('app.locale') == 'en'){
                        $success_output = '<div class="alert alert-success">تم تحديث البيانات بنجاح</div>';
                    }
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
                    'name_en' => 'required',
                    'name_ar' => 'required',
                    'active' => 'required',
                ],[
                    'name_en.required' => 'Please Enter cat Name in English',
                    'name_ar.required' => 'Please Enter cat Name in Arabic',
                    'active.required' => 'Please Enter Activation Status',
                ]);
            }elseif(Config::get('app.locale') == 'ar'){
                $validation = Validator::make($request->all(), [
                    'name_en' => 'required',
                    'name_ar' => 'required',
                    'active' => 'required',
                ],[
                    'name_en.required' => 'Please Enter cat Name in English',
                    'name_ar.required' => 'Please Enter cat Name in Arabic',
                    'active.required' => 'Please Enter Activation Status',
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
                $cat = new Cat;
                $cat->name_en = $request->name_en;
                $cat->name_ar = $request->name_ar;
                if($request->active == "on"){
                    $cat->active = 1;
                }elseif(empty($request->active)){
                    $cat->active = 0;
                }
                
                if($cat->save()){
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
        $id = $request->input('id');
        $cat = Cat::where('cat_id','=',$id);
        $cat->delete(); 
    }

    function massremove(Request $request)
    {
        $cat_id_array = $request->input('id');
        $cat = Cat::whereIn('cat_id', $cat_id_array);
        $cat->delete();
    }

}

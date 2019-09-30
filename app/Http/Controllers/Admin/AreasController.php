<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Area;
use DB;
use Validator;
use Config;
use Yajra\DataTables\Facades\DataTables;

class AreasController extends Controller
{
    public function getIndex() {
        return view('admin.pages.area.index');
    }

    public function getdata() {
        if (Config::get('app.locale') == 'en'){
            $areas = Area::select('areas_id','area_name');
        }elseif(Config::get('app.locale') == 'ar'){
            $areas = Area::select('areas_id','area_name_ar');
        }
        return Datatables::of($areas)
        ->addColumn('action', function($area){
            return '<a href="#" class="text-primary edit" id="'.$area->areas_id.'"><i class="fa fa-edit"></i></a>     <a href="#" class="text-danger btndelet" id="'.$area->areas_id.'"><i class="fa fa-close"></i></a>';
        })
        ->addColumn('checkbox', '<input type="checkbox" name="area_checkbox[]" class="area_checkbox" value="{{$areas_id}}" />')
        ->rawColumns(['checkbox','action'])
        ->make(true);
    }

    function fetchdata(Request $request){
        $id = $request->input('id');
        $areas = DB::table('areas')->select('areas.*')->where('areas_id','=',$id)->get();
        echo json_encode($areas);
    }
    
    function postdata(Request $request){
        $error_array = array();
        $success_output = '';
        if($request->get('button_action') == 'update'){
            $id = $request->input('area_id');
            $area_name = $request->input('area_name');
            $area_name_ar = $request->input('area_name_ar');
            if (isset($request->active)) {
                $active = 1;
                $data = array('area_name' => $area_name,'area_name_ar' => $area_name_ar,
                          'active' => $active);

                $area2 = DB::table('areas')
                        ->where('areas_id','=',$id)->update($data);            
                
                if($area2){
                    if (Config::get('app.locale') == 'en'){
                        $success_output = '<div class="alert alert-success">Data Updated Successfully</div>';
                    }elseif(Config::get('app.locale') == 'en'){
                        $success_output = '<div class="alert alert-success">تم تحديث البيانات بنجاح</div>';
                    }
                }
            }else{
                $active = 0;
                $data = array('area_name' => $area_name,'area_name_ar' => $area_name_ar,
                          'active' => $active);

                $area2 = DB::table('areas')
                        ->where('areas_id','=',$id)->update($data);            
                
                if($area2){
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
                    'area_name' => 'required',
                    'area_name_ar' => 'required',
                    'active' => 'required',
                ],[
                    'area_name.required' => 'Please Enter area Name in English',
                    'area_name_ar.required' => 'Please Enter area Name in Arabic',
                    'active.required' => 'Please Enter Activation Status',
                ]);
            }elseif(Config::get('app.locale') == 'ar'){
                $validation = Validator::make($request->all(), [
                    'area_name' => 'required',
                    'area_name_ar' => 'required',
                    'active' => 'required',
                ],[
                    'area_name.required' => 'Please Enter area Name in English',
                    'area_name_ar.required' => 'Please Enter area Name in Arabic',
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
                $area = new Area;
                $area->area_name = $request->area_name;
                $area->area_name_ar = $request->area_name_ar;
                if($request->active == "on"){
                    $area->active = 1;
                }elseif(empty($request->active)){
                    $area->active = 0;
                }
                
                if($area->save()){
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
        $area = Area::where('areas_id','=',$id);
        $area->delete(); 
    }

    function massremove(Request $request)
    {
        $area_id_array = $request->input('id');
        $area = Area::whereIn('areas_id', $area_id_array);
        $area->delete();
    }

}

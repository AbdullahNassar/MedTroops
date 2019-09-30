<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Service;
use Validator;
use Config;
use DB;
use Yajra\DataTables\Facades\DataTables;

class ServicesController extends Controller
{
    public function getIndex() {
        return view('admin.pages.service.index');
    }

    public function getdata() {
        if (Config::get('app.locale') == 'en'){
            $services = Service::select('id','name_en','content_en');
        }elseif(Config::get('app.locale') == 'ar'){
            $services = Service::select('id','name_ar','content_ar');
        }
        return Datatables::of($services)
        ->addColumn('action', function($service){
            return '<a href="#" class="text-primary edit" id="'.$service->id.'"><i class="fa fa-edit"></i></a>     <a href="#" class="text-danger btndelet" id="'.$service->id.'"><i class="fa fa-close"></i></a>     <a href="#" class="text-primary view" id="'.$service->id.'"><i class="fa fa-eye"></i></a>';
        })
        ->addColumn('checkbox', '<input type="checkbox" name="service_checkbox[]" class="service_checkbox" value="{{$id}}" />')
        ->rawColumns(['checkbox','action'])
        ->make(true);
    }

    function fetchdata(Request $request){
        $id = $request->input('id');
        $service = Service::find($id);
        $output = array(
            'name_en' => $service->name_en,
            'name_ar' => $service->name_ar,
            'content_en' => $service->content_en,
            'content_ar' => $service->content_ar,
            'image' => $service->image,
            'active' => $service->active
        );
        echo json_encode($output);
    }

    function postdata(Request $request){
        $error_array = array();
        $success_output = '';
        if($request->get('button_action') == 'update'){
            $service2 = Service::find($request->input('service_id'));
            $destination2 = storage_path('uploads/' . $request->storage);
            $image2 = $request->file('service_image');
            if ($image2 != null) {
                if (is_file($destination2 . "/{$image2}")) {
                    @unlink($destination2 . "/{$image2}");
                }
                $imageName = $image2->getClientOriginalName();
                $image2->move($destination2, $imageName);
                $service2->image = $imageName;
            }

            $service2->name_en = $request->name_en;
            $service2->name_ar = $request->name_ar;
            $service2->content_en = $request->content_en;
            $service2->content_ar = $request->content_ar;
            if (isset($request->active)) {
                $service2->active = 1;
            }else{
                $service2->active = 0;
            }
            
            if($service2->save()){
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
                    'service_image' => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
                    'name_en' => 'required',
                    'name_ar' => 'required',
                    'content_en' => 'required',
                    'content_ar' => 'required',
                ],[
                    'service_image.required' => 'Please Upload Image',
                    'service_image.image' => 'Please upload image not video',
                    'service_image.mimes' => 'Image type : jpeg,jpg,png,gif',
                    'service_image.max' => 'Max Size 20 MB',
                    'name_en.required' => 'Please Enter Service Name in English',
                    'name_ar.required' => 'Please Enter Service Name in Arabic',
                    'content_en.required' => 'Please Enter Service Content in English',
                    'content_ar.required' => 'Please Enter Service Content in Arabic',
                ]);
            }elseif(Config::get('app.locale') == 'ar'){
                $validation = Validator::make($request->all(), [
                    'service_image' => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
                    'name_en' => 'required',
                    'name_ar' => 'required',
                    'content_en' => 'required',
                    'content_ar' => 'required',
                ],[
                    'service_image.required' => 'Please Upload Image',
                    'service_image.image' => 'Please upload image not video',
                    'service_image.mimes' => 'Image type : jpeg,jpg,png,gif',
                    'service_image.max' => 'Max Size 20 MB',
                    'name_en.required' => 'Please Enter Service Name in English',
                    'name_ar.required' => 'Please Enter Service Name in Arabic',
                    'content_en.required' => 'Please Enter Service Content in English',
                    'content_ar.required' => 'Please Enter Service Content in Arabic',
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
                $service = new Service;
                $destination = storage_path('uploads/' . $request->storage);
                $image = $request->file('service_image');
                if($request->hasFile('service_image')){
                    if (is_file($destination . "/{$image}")) {
                        @unlink($destination . "/{$image}");
                    }
                    $imageName = $image->getClientOriginalName();
                    $image->move($destination, $imageName);
                    $service->image = $imageName;
                }else{
                    $service->image = "1.jpg";
                }
                $service->name_en = $request->name_en;
                $service->name_ar = $request->name_ar;
                $service->content_en = $request->content_en;
                $service->content_ar = $request->content_ar;
                if($request->active == "on"){
                    $service->active = 1;
                }elseif(empty($request->active)){
                    $service->active = 0;
                }
                
                if($service->save()){
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
        $service = Service::find($request->input('id'));
        $service->delete();
    }

    function massremove(Request $request)
    {
        $service_id_array = $request->input('id');
        $service = Service::whereIn('id', $service_id_array);
        $service->delete();
    }

}

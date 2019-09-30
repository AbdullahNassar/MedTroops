<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Slider;
use Validator;
use Config;
use DB;
use Yajra\DataTables\Facades\DataTables;

class SlidersController extends Controller
{
    public function getIndex() {
        return view('admin.pages.slider.index');
    }

    public function getdata() {
        if (Config::get('app.locale') == 'en'){
            $sliders = Slider::select('id','title_en', 'head_en','button_en');
        }elseif(Config::get('app.locale') == 'ar'){
            $sliders = Slider::select('id','title_ar', 'head_ar','button_ar');
        }
        return Datatables::of($sliders)
        ->addColumn('action', function($slider){
            return '<a href="#" class="text-primary edit" id="'.$slider->id.'"><i class="fa fa-edit"></i></a>     <a href="#" class="text-danger btndelet" id="'.$slider->id.'"><i class="fa fa-close"></i></a>     <a href="#" class="text-primary view" id="'.$slider->id.'"><i class="fa fa-eye"></i></a>';
        })
        ->addColumn('checkbox', '<input type="checkbox" name="slider_checkbox[]" class="slider_checkbox" value="{{$id}}" />')
        ->rawColumns(['checkbox','action'])
        ->make(true);
    }

    function fetchdata(Request $request){
        $id = $request->input('id');
        $slider = Slider::find($id);
        $output = array(
            'image' => $slider->image,
            'title_ar' => $slider->title_ar,
            'title_en' => $slider->title_en,
            'head_ar' => $slider->head_ar,
            'head_en' => $slider->head_en,
            'content_ar'  => $slider->content_ar,
            'content_en'  => $slider->content_en,
            'button_ar' => $slider->button_ar,
            'button_en'  => $slider->button_en,
            'url' => $slider->url,
            'active' => $slider->active,
        );
        echo json_encode($output);
    }

    function postdata(Request $request){
        $error_array = array();
        $success_output = '';
        if($request->get('button_action') == 'update'){
            $slider2 = Slider::find($request->input('slider_id'));
            $destination2 = storage_path('uploads/' . $request->storage);
            $image2 = $request->file('slider_image');
            if ($image2 != null) {
                if (is_file($destination2 . "/{$image2}")) {
                    @unlink($destination2 . "/{$image2}");
                }
                $imageName = $image2->getClientOriginalName();
                $image2->move($destination2, $imageName);
                $slider2->image = $imageName;
            }
            $slider2->title_ar = $request->title_ar;
            $slider2->title_en = $request->title_en;
            $slider2->head_ar = $request->head_ar;
            $slider2->head_en = $request->head_en;
            $slider2->content_ar = $request->content_ar;
            $slider2->content_en = $request->content_en;
            $slider2->button_ar = $request->button_ar;
            $slider2->button_en = $request->button_en;
            $slider2->url = $request->url;
            if(isset($request->active)) {
                $slider2->active = 1;
            }else{
                $slider2->active = 0;
            }
            
            if($slider2->save()){
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
                    'slider_image' => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
                    'title_ar' => 'required',
                    'title_en' => 'required',
                    'head_ar' => 'required',
                    'head_en' => 'required',
                    'content_ar' => 'required',
                    'content_en' => 'required',
                    'button_ar'  => 'required',
                    'button_en' => 'required',
                    'url' => 'required',
                ],[
                    'slider_image.required' => 'Please Upload Image',
                    'slider_image.image' => 'Please upload image not video',
                    'slider_image.mimes' => 'Image type : jpeg,jpg,png,gif',
                    'slider_image.max' => 'Max Size 20 MB',
                    'title_en.required' => 'Please Enter Slider Title in English',
                    'title_ar.required' => 'Please Enter Slider Title in Arabic',
                    'head_en.required' => 'Please Enter Slider Header in English',
                    'head_ar.required' => 'Please Enter Slider Header in Arabic',
                    'content_en.required' => 'Please Enter Slider Content in English',
                    'content_ar.required' => 'Please Enter Slider Content in Arabic',
                    'button_en.required' => 'Please Enter Slider Button Text in English',
                    'button_ar.required' => 'Please Enter Slider Button Text in Arabic',
                    'url.required' => 'Please Enter Slider Button URL',
                ]);
            }elseif(Config::get('app.locale') == 'ar'){
                $validation = Validator::make($request->all(), [
                    'slider_image' => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
                    'title_ar' => 'required',
                    'title_en' => 'required',
                    'head_ar' => 'required',
                    'head_en' => 'required',
                    'content_ar' => 'required',
                    'content_en' => 'required',
                    'button_ar'  => 'required',
                    'button_en' => 'required',
                    'url' => 'required',
                ],[
                    'slider_image.required' => 'Please Upload Image',
                    'slider_image.image' => 'Please upload image not video',
                    'slider_image.mimes' => 'Image type : jpeg,jpg,png,gif',
                    'slider_image.max' => 'Max Size 20 MB',
                    'title_en.required' => 'Please Enter Slider Title in English',
                    'title_ar.required' => 'Please Enter Slider Title in Arabic',
                    'head_en.required' => 'Please Enter Slider Header in English',
                    'head_ar.required' => 'Please Enter Slider Header in Arabic',
                    'content_en.required' => 'Please Enter Slider Content in English',
                    'content_ar.required' => 'Please Enter Slider Content in Arabic',
                    'button_en.required' => 'Please Enter Slider Button Text in English',
                    'button_ar.required' => 'Please Enter Slider Button Text in Arabic',
                    'url.required' => 'Please Enter Slider Button URL',
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
                $slider = new Slider;
                $destination = storage_path('uploads/' . $request->storage);
                $image = $request->file('slider_image');
                if($request->hasFile('slider_image')){
                    if (is_file($destination . "/{$image}")) {
                        @unlink($destination . "/{$image}");
                    }
                    $imageName = $image->getClientOriginalName();
                    $image->move($destination, $imageName);
                    $slider->image = $imageName;
                }else{
                    $slider->image = "slide1-man.png";
                }
                $slider->title_ar = $request->title_ar;
                $slider->title_en = $request->title_en;
                $slider->head_ar = $request->head_ar;
                $slider->head_en = $request->head_en;
                $slider->content_ar = $request->content_ar;
                $slider->content_en = $request->content_en;
                $slider->button_ar = $request->button_ar;
                $slider->button_en = $request->button_en;
                $slider->url = $request->url;
                if($request->active == "on"){
                    $slider->active = 1;
                }elseif(empty($request->active)){
                    $slider->active = 0;
                }
                
                if($slider->save()){
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
        $slider = Slider::find($request->input('id'));
        $slider->delete();
    }

    function massremove(Request $request)
    {
        $slider_id_array = $request->input('id');
        $slider = Slider::whereIn('id', $slider_id_array);
        $slider->delete();
    }

}

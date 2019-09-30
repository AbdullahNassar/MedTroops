<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Special;
use Validator;
use Config;
use DB;
use Yajra\DataTables\Facades\DataTables;

class SpecialsController extends Controller
{
    public function getIndex() {
        return view('admin.pages.special.index');
    }

    public function getdata() {
        if (Config::get('app.locale') == 'en'){
            $specials = Special::select('special_id','special_name', 'content');
        }elseif(Config::get('app.locale') == 'ar'){
            $specials = Special::select('special_id','special_name_ar', 'content_ar');
        }
        return Datatables::of($specials)
        ->addColumn('action', function($special){
            return '<a href="#" class="text-primary edit" id="'.$special->special_id.'"><i class="fa fa-edit"></i></a>     <a href="#" class="text-danger btndelet" id="'.$special->special_id.'"><i class="fa fa-close"></i></a>     <a href="#" class="text-primary view" id="'.$special->special_id.'"><i class="fa fa-eye"></i></a>';
        })
        ->addColumn('checkbox', '<input type="checkbox" name="special_checkbox[]" class="special_checkbox" value="{{$special_id}}" />')
        ->rawColumns(['checkbox','action'])
        ->make(true);
    }

    function fetchdata(Request $request){
        $id = $request->input('id');
        $specials = DB::table('specials')->select('specials.*')->where('special_id','=',$id)->get();
        echo json_encode($specials);
    }

    function postdata(Request $request){
        $error_array = array();
        $success_output = '';
        if($request->get('button_action') == 'update'){
            $id = $request->input('special_id');
            $destination2 = storage_path('uploads/' . $request->storage);
            if($request->hasFile('special_image')){
                $image2 = $request->file('special_image');
                if (is_file($destination2 . "/{$image2}")) {
                    @unlink($destination2 . "/{$image2}");
                }
                $imageName = $image2->getClientOriginalName();
                $image2->move($destination2, $imageName);
            
                $title_en = $request->input('title_en');
                $title_ar = $request->input('title_ar');
                $content_en = $request->input('content_en');
                $content_ar = $request->input('content_ar');
                if(isset($request->active)) {
                    $active = 1;
                    $data = array('special_name_ar' => $title_ar,'special_name' => $title_en,
                                'content_ar' => $content_ar,'content' => $content_en,'image' => $imageName,
                                'active' => $active);

                    $special2 = DB::table('specials')
                                ->where('special_id','=',$id)->update($data);            
                    
                    if($special2){
                        if (Config::get('app.locale') == 'en'){
                            $success_output = '<div class="alert alert-success">Data Updated Successfully</div>';
                        }elseif(Config::get('app.locale') == 'en'){
                            $success_output = '<div class="alert alert-success">تم تحديث البيانات بنجاح</div>';
                        }
                    }
                }else{
                    $active = 0;
                    $data = array('special_name_ar' => $title_ar,'special_name' => $title_en,
                                'content_ar' => $content_ar,'content' => $content_en,'image' => $imageName,
                                'active' => $active);

                    $special2 = DB::table('specials')
                                ->where('special_id','=',$id)->update($data);            
                    
                    if($special2){
                        if (Config::get('app.locale') == 'en'){
                            $success_output = '<div class="alert alert-success">Data Updated Successfully</div>';
                        }elseif(Config::get('app.locale') == 'en'){
                            $success_output = '<div class="alert alert-success">تم تحديث البيانات بنجاح</div>';
                        }
                    }
                }
            }else{
                $title_en = $request->input('title_en');
                $title_ar = $request->input('title_ar');
                $content_en = $request->input('content_en');
                $content_ar = $request->input('content_ar');
                if (isset($request->active)) {
                    $active = 1;
                    $data = array('special_name_ar' => $title_ar,'special_name' => $title_en,
                                'content_ar' => $content_ar,'content' => $content_en,
                                'active' => $active);

                    $special2 = DB::table('specials')
                                ->where('special_id','=',$id)->update($data);            
                    
                    if($special2){
                        if (Config::get('app.locale') == 'en'){
                            $success_output = '<div class="alert alert-success">Data Updated Successfully</div>';
                        }elseif(Config::get('app.locale') == 'en'){
                            $success_output = '<div class="alert alert-success">تم تحديث البيانات بنجاح</div>';
                        }
                    }
                }else{
                    $active = 0;
                    $data = array('special_name_ar' => $title_ar,'special_name' => $title_en,
                                'content_ar' => $content_ar,'content' => $content_en,
                                'active' => $active);

                    $special2 = DB::table('specials')
                                ->where('special_id','=',$id)->update($data);            
                    
                    if($special2){
                        if (Config::get('app.locale') == 'en'){
                            $success_output = '<div class="alert alert-success">Data Updated Successfully</div>';
                        }elseif(Config::get('app.locale') == 'en'){
                            $success_output = '<div class="alert alert-success">تم تحديث البيانات بنجاح</div>';
                        }
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
                    'special_image' => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
                    'title_ar' => 'required',
                    'title_en' => 'required',
                    'content_ar' => 'required',
                    'content_en' => 'required',
                ],[
                    'special_image.required' => 'Please Upload Image',
                    'special_image.image' => 'Please upload image not video',
                    'special_image.mimes' => 'Image type : jpeg,jpg,png,gif',
                    'special_image.max' => 'Max Size 20 MB',
                    'title_en.required' => 'Please Enter special Title in English',
                    'title_ar.required' => 'Please Enter special Title in Arabic',
                    'content_en.required' => 'Please Enter special Content in English',
                    'content_ar.required' => 'Please Enter special Content in Arabic',
                ]);
            }elseif(Config::get('app.locale') == 'ar'){
                $validation = Validator::make($request->all(), [
                    'special_image' => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
                    'title_ar' => 'required',
                    'title_en' => 'required',
                    'content_ar' => 'required',
                    'content_en' => 'required',
                ],[
                    'special_image.required' => 'Please Upload Image',
                    'special_image.image' => 'Please upload image not video',
                    'special_image.mimes' => 'Image type : jpeg,jpg,png,gif',
                    'special_image.max' => 'Max Size 20 MB',
                    'title_en.required' => 'Please Enter special Title in English',
                    'title_ar.required' => 'Please Enter special Title in Arabic',
                    'content_en.required' => 'Please Enter special Content in English',
                    'content_ar.required' => 'Please Enter special Content in Arabic',
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
                $special = new Special;
                $destination = storage_path('uploads/' . $request->storage);
                $image = $request->file('special_image');
                if($request->hasFile('special_image')){
                    if (is_file($destination . "/{$image}")) {
                        @unlink($destination . "/{$image}");
                    }
                    $imageName = $image->getClientOriginalName();
                    $image->move($destination, $imageName);
                    $special->image = $imageName;
                }else{
                    $special->image = "slide1-man.png";
                }
                $special->special_name_ar = $request->title_ar;
                $special->special_name = $request->title_en;
                $special->content_ar = $request->content_ar;
                $special->content = $request->content_en;
                if($request->active == "on"){
                    $special->active = 1;
                }elseif(empty($request->active)){
                    $special->active = 0;
                }
                
                if($special->save()){
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
        $special = Special::where('special_id','=',$id);
        $special->delete(); 
    }

    function massremove(Request $request)
    {
        $special_id_array = $request->input('id');
        $special = Special::whereIn('special_id', $special_id_array);
        $special->delete();
    }

}

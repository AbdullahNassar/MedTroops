<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\Stat;

class StaticController extends Controller {

	public function getIndex() {
        $static = Stat::find(1);
        return view('admin.pages.static.index', compact('static'));
    }

    function postdata(Request $request){
        $error_array = array();
        $success_output = '';
        if($request->get('button_action') == 'update'){
            $id = 1;
            $static2 = Stat::find($id);
            $destination2 = storage_path('uploads/' . $request->storage);
            $image2 = $request->file('about_image');
            if ($image2 != null) {
                if (is_file($destination2 . "/{$image2}")) {
                    @unlink($destination2 . "/{$image2}");
                }
                $imageName = $image2->getClientOriginalName();
                $image2->move($destination2, $imageName);
                $static2->about_image = $imageName;
            }

            $static2->header_en = $request->header_en;
            $static2->header_ar = $request->header_ar;
            $static2->f_head_en = $request->f_head_en;
            $static2->f_head_ar = $request->f_head_ar;
            $static2->f_content_en = $request->f_content_en;
            $static2->f_content_ar = $request->f_content_ar;
            $static2->f_video = $request->f_video;
            $static2->app_head_en = $request->app_head_en;
            $static2->app_head_ar = $request->app_head_ar;
            $static2->android = $request->android;
            $static2->ios = $request->ios;
            $static2->footer_en = $request->footer_en;
            $static2->footer_ar = $request->footer_ar;
            $static2->about_head_en = $request->about_head_en;
            $static2->about_head_ar = $request->about_head_ar;
            $static2->about_content_en = $request->about_content_en;
            $static2->about_content_ar = $request->about_content_ar;
            $static2->contact_en = $request->contact_en;
            $static2->contact_ar = $request->contact_ar;
            
            if($static2->save()){
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
    
}

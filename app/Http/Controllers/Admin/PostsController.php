<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Post;
use App\Cat;
use Validator;
use Config;
use DB;
use Yajra\DataTables\Facades\DataTables;

class PostsController extends Controller
{
    public function getIndex() {
        return view('admin.pages.post.index');
    }

    public function getdata() {
        if (Config::get('app.locale') == 'en'){
            $posts = Post::select('id','title_en', 'head_en');
        }elseif(Config::get('app.locale') == 'ar'){
            $posts = Post::select('id','title_ar', 'head_ar');
        }
        return Datatables::of($posts)
        ->addColumn('action', function($post){
            return '<a href="#" class="text-primary edit" id="'.$post->id.'"><i class="fa fa-edit"></i></a>     <a href="#" class="text-danger btndelet" id="'.$post->id.'"><i class="fa fa-close"></i></a>     <a href="#" class="text-primary view" id="'.$post->id.'"><i class="fa fa-eye"></i></a>';
        })
        ->addColumn('checkbox', '<input type="checkbox" name="post_checkbox[]" class="post_checkbox" value="{{$id}}" />')
        ->rawColumns(['checkbox','action'])
        ->make(true);
    }

    function fetchdata(Request $request){
        $id = $request->input('id');
        $post = Post::find($id);
        $output = array(
            'image' => $post->image,
            'title_ar' => $post->title_ar,
            'title_en' => $post->title_en,
            'head_ar' => $post->head_ar,
            'head_en' => $post->head_en,
            'content_ar'  => $post->content_ar,
            'content_en'  => $post->content_en,
            'cat_id' => $post->cat_id,
            'active' => $post->active,
        );
        echo json_encode($output);
    }

    function postdata(Request $request){
        $error_array = array();
        $success_output = '';
        if($request->get('button_action') == 'update'){
            $post2 = Post::find($request->input('post_id'));
            $destination2 = storage_path('uploads/' . $request->storage);
            $image2 = $request->file('post_image');
            if ($image2 != null) {
                if (is_file($destination2 . "/{$image2}")) {
                    @unlink($destination2 . "/{$image2}");
                }
                $imageName = $image2->getClientOriginalName();
                $image2->move($destination2, $imageName);
                $post2->image = $imageName;
            }
            $post2->title_ar = $request->title_ar;
            $post2->title_en = $request->title_en;
            $post2->head_ar = $request->head_ar;
            $post2->head_en = $request->head_en;
            $post2->content_ar = $request->content_ar;
            $post2->content_en = $request->content_en;
            $post2->category_id = $request->cat_id;
            if(isset($request->active)) {
                $post2->active = 1;
            }else{
                $post2->active = 0;
            }
            
            if($post2->save()){
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
                    'post_image' => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
                    'title_ar' => 'required',
                    'title_en' => 'required',
                    'head_ar' => 'required',
                    'head_en' => 'required',
                    'content_ar' => 'required',
                    'content_en' => 'required',
                ],[
                    'post_image.required' => 'Please Upload Image',
                    'post_image.image' => 'Please upload image not video',
                    'post_image.mimes' => 'Image type : jpeg,jpg,png,gif',
                    'post_image.max' => 'Max Size 20 MB',
                    'title_en.required' => 'Please Enter Post Title in English',
                    'title_ar.required' => 'Please Enter Post Title in Arabic',
                    'head_en.required' => 'Please Enter Post Header in English',
                    'head_ar.required' => 'Please Enter Post Header in Arabic',
                    'content_en.required' => 'Please Enter Post Content in English',
                    'content_ar.required' => 'Please Enter Post Content in Arabic',
                ]);
            }elseif(Config::get('app.locale') == 'ar'){
                $validation = Validator::make($request->all(), [
                    'post_image' => 'required|image|mimes:jpeg,jpg,png,gif,pdf|max:20000',
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
                    'post_image.required' => 'Please Upload Image',
                    'post_image.image' => 'Please upload image not video',
                    'post_image.mimes' => 'Image type : jpeg,jpg,png,gif',
                    'post_image.max' => 'Max Size 20 MB',
                    'title_en.required' => 'Please Enter Post Title in English',
                    'title_ar.required' => 'Please Enter Post Title in Arabic',
                    'head_en.required' => 'Please Enter Post Header in English',
                    'head_ar.required' => 'Please Enter Post Header in Arabic',
                    'content_en.required' => 'Please Enter Post Content in English',
                    'content_ar.required' => 'Please Enter Post Content in Arabic',
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
                $post = new Post;
                $destination = storage_path('uploads/' . $request->storage);
                $image = $request->file('post_image');
                if($request->hasFile('post_image')){
                    if (is_file($destination . "/{$image}")) {
                        @unlink($destination . "/{$image}");
                    }
                    $imageName = $image->getClientOriginalName();
                    $image->move($destination, $imageName);
                    $post->image = $imageName;
                }else{
                    $post->image = "slide1-man.png";
                }
                $post->title_ar = $request->title_ar;
                $post->title_en = $request->title_en;
                $post->head_ar = $request->head_ar;
                $post->head_en = $request->head_en;
                $post->content_ar = $request->content_ar;
                $post->content_en = $request->content_en;
                $post->category_id = $request->cat_id;
                if($request->active == "on"){
                    $post->active = 1;
                }elseif(empty($request->active)){
                    $post->active = 0;
                }
                
                if($post->save()){
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
        $post = Post::find($request->input('id'));
        $post->delete();
    }

    function massremove(Request $request)
    {
        $post_id_array = $request->input('id');
        $post = Post::whereIn('id', $post_id_array);
        $post->delete();
    }

    function cat(){
        $cats = Cat::get()->where('active','=',1);
        echo json_encode($cats);
    }

    function postcat(Request $request){
        $id = $request->input('id');
        $postcats = DB::table('posts')
                ->join('cats','posts.category_id','=','cats.cat_id')
                ->select('cats.*')
                ->where("posts.id", $id)
                ->get();
        echo json_encode($postcats);
    }

}

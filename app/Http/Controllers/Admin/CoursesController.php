<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Course;
use App\CourseMaterial;
use App\CourseTime;
use App\Material;
use App\Center;
use App\Level;
use Config;
use DB;

class CoursesController extends Controller
{
    public function getIndex() {
        $courses = DB::table('courses')
                ->join('centers','courses.center_id','=','centers.id')
                ->select('courses.*','centers.center_name')
                ->where("courses.active", 1)
                ->get();
        $centers = Center::where("active", 1)->get();
        $levels = Level::where("active", 1)->get();
        $materials = Material::where("active", 1)->get();
        return view('admin.pages.course.index', compact('courses','levels','centers','materials'));
    }

    public function getAdd() {
        $courses = Course::where("active", 1)->get();
        $centers = Center::where("active", 1)->get();
        $levels = Level::where("active", 1)->get();
        $materials = Material::where("active", 1)->get();
        return view('admin.pages.course.add', compact('courses','levels','centers','materials'));
    }

    public function insert(Request $request) {
        $v = validator($request->all() ,[
            'name' => 'required',
            'center_id' => 'required',
            'max_num' => 'required',
            'time' => 'required',
        ] ,[
            'name.required' => 'من فضلك أدخل اسم الحلقة',
            'center_id.required' => 'من فضلك اختر احد المراكز',
            'max_num.required' => 'من فضلك أدخل الحد الاقصى لعدد الطلاب ',
            'time.required' => 'من فضلك أدخل المواعيد',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $course = new Course();

        $course->course_name = $request->name;
        $course->center_id = $request->center_id;
        $course->max_num = $request->max_num;
        if($request->active == "on"){
            $course->active = 1;
        }elseif(empty($request->active)){
            $course->active = 0;
        }

        if($course->save()){
            $count = $request->time;
            for($i=1; $i<=$count; $i++){
                $time = new CourseTime();
                $time->course_id = $course->id;
                $time->day = $request->input('dayName_'.$i);
                $time->time_from = $request->input('dayFrom_'.$i);
                $time->time_to = $request->input('dayTo_'.$i);
                $time->save();
            }
            return ['status' => 'succes' ,'data' => 'تم اضافة البيانات بنجاح'];            
        }else{
            return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
        }
    }

    public function getEdit($id) {
        if (isset($id)) {
            $courses = Course::where("active", 1)->get();
            $groups = DB::table('courses')
                    ->join('centers','courses.center_id','=','centers.id')
                    ->select('courses.*','centers.center_name')
                    ->where('courses.id','=',$id)
                    ->get();
            $materials = Material::where("active", 1)->get();
            $mats = DB::table('course_materials')
                    ->join('courses','course_materials.course_id','=','courses.id')
                    ->join('materials','course_materials.material_id','=','materials.id')
                    ->select('course_materials.*','courses.course_name','materials.material_name')
                    ->where('course_materials.course_id','=',$id)
                    ->get();
            $centers = Center::where("active", 1)->get();
            $levels = Level::where("active", 1)->get();
            $tlevels = DB::table('course_levels')
                    ->join('courses','course_levels.course_id','=','courses.id')
                    ->join('levels','course_levels.level_id','=','levels.id')
                    ->select('course_levels.*','courses.course_name','levels.level_name')
                    ->where('course_levels.course_id','=',$id)
                    ->get();
            $times = CourseTime::where("course_id",$id)->get();
            return view('admin.pages.course.edit', compact('tlevels','groups','courses','centers','levels','materials','mats','times'));
        }        
    }

    public function postEdit(Request $request,$id) {
        
        $course = Course::find($id);
        $course->course_name = $request->name;
        $course->center_id = $request->center_id;
        $course->max_num = $request->max_num;
        if($request->active == "on"){
            $course->active = 1;
        }elseif(empty($request->active)){
            $course->active = 0;
        }
        
        if($course->save()){
            $time = CourseTime::where("course_id",$id)->get();
            foreach($time as $t){
                $t->day = $request->input('timeName_'.$t->id);
                $t->time_from = $request->input('timeFrom_'.$t->id);
                $t->time_to = $request->input('timeTo_'.$t->id);
                $t->save();
            }
            if(isset($request->time)){
                $count = $request->time;
                for($i=1; $i<=$count; $i++){
                    $times = new CourseTime();
                    $times->course_id = $course->id;
                    $times->day = $request->input('dayName_'.$i);
                    $times->time_from = $request->input('dayFrom_'.$i);
                    $times->time_to = $request->input('dayTo_'.$i);
                    $times->save();
                }
            }
            return ['status' => 'succes' ,'data' => 'تم تحديث البيانات بنجاح'];
        }else{
            return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
        }
    }

    public function delete($id) {
        if (isset($id)) {
            $course = Course::find($id);
            $course->delete();

            DB::table('course_materials')->where('course_id','=', $id)->delete();
            DB::table('course_times')->where('course_id','=', $id)->delete();
            DB::table('course_levels')->where('course_id','=', $id)->delete();

            return redirect()->back();
        }
    }

    public function mdelete($id) {
        if (isset($id)) {
            DB::table('course_materials')->where('id','=', $id)->delete();

            return redirect()->back();
        }
    }

    public function tlevel($id) {
        if (isset($id)) {
            DB::table('course_levels')->where('id','=', $id)->delete();

            return redirect()->back();
        }
    }

    public function coursetime($id) {
        if (isset($id)) {
            DB::table('course_times')->where('id','=', $id)->delete();

            return redirect()->back();
        }
    }

}

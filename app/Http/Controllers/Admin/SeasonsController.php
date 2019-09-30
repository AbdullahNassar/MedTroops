<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Season;
use Config;
use DB;

class SeasonsController extends Controller
{
    public function getIndex() {
        $seasons = Season::where("active", 1)->get();
        return view('admin.pages.season.index', compact('seasons'));
    }

    public function getAdd() {
        $seasons = Season::where("active", 1)->get();
        return view('admin.pages.season.add', compact('seasons'));
    }

    public function insert(Request $request) {
        $v = validator($request->all() ,[
            'name' => 'required',
            'price' => 'required',
        ] ,[
            'name.required' => 'من فضلك أدخل اسم الفصل الدراسي',
            'price.required' => 'من فضلك أدخل مصروفات الفصل الدراسي',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $season = new Season();

        $season->season_name = $request->name;
        $season->price = $request->price;
        if($request->active == "on"){
            $season->active = 1;
        }elseif(empty($request->active)){
            $season->active = 0;
        }
        
        if ($season->save()){
            return ['status' => 'succes' ,'data' => 'تم اضافة البيانات بنجاح'];            
        }else{
            return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
        }
    }

    public function getEdit($id) {
        if (isset($id)) {
            $seasons = Season::where("active", 1)->get();
            $season = Season::find($id);
            return view('admin.pages.season.edit', compact('season','seasons'));
        }        
    }

    public function postEdit(Request $request,$id) {

        $season = Season::find($id);
        $season->season_name = $request->name;
        $season->price = $request->price;
        if($request->active == "on"){
            $season->active = 1;
        }elseif(empty($request->active)){
            $season->active = 0;
        }

        if ($season->save()){
            return ['status' => 'succes' ,'data' => 'تم تحديث البيانات بنجاح'];
        }else{
            return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
        }
    }

    public function delete($id) {
        if (isset($id)) {
            $season = Season::find($id);
            $season->delete();

            return redirect()->back();
        }
    }

}

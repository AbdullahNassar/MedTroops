<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Doc;
use App\Type;
use DB;

class DataController extends Controller {

	public function getData()
    {
        $docs = DB::table('docs')
                ->join('types','docs.type_id','=','types.id')
                ->select('docs.*','types.name')
                ->get();
        $types = Type::all();

        return view('admin.pages.data', compact('docs','types'));
    }


    public function add(Request $request) {

        $v = validator($request->all() ,[
            'image' => 'required|mimes:jpeg,jpg,png,gif,pdf|max:20000',
            'type' => 'required',
        ] ,[
            'image.required' => 'من فضلك قم بتحميل الملف',
            'image.mimes' => 'يرجى تحميل ملفات بصيغة  JPG,PNG,GIF,PDF',
            'image.max' => 'الحد الاقصى لحجم الملف : 20 MB',
            'type.required' => 'من فضلك اختر نوع الوثيقة',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $doc = new Doc();

        $doc->type_id = $request->type;

        $destination = storage_path('uploads/' . $request->storage);
        $image = $request->file('image');
        if ($image) {
            if (is_file($destination . "/{$image}")) {
                @unlink($destination . "/{$image}");
            }
            $imageName = $image->getClientOriginalName();
            $image->move($destination, $imageName);
            $doc->file = $imageName;
        }
        

        if ($doc->save()){
            return ['status' => 'succes' ,'data' => 'تم اضافة البيانات بنجاح'];            
        }else{
            return ['status' => false ,'data' => 'حدث خطأ , من فضلك أعد المحاولة '];
        }
    }

    public function delete($id) {
        if (isset($id)) {
            $doc = Doc::find($id);

            $doc->delete();

            return redirect()->back();
        }
    }
    
}

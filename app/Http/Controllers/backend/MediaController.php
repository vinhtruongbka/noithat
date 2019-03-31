<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Banners;

class MediaController extends Controller
{
     /**
    * Create a new controller instance.
    *
    * @return void
    */
   public function __construct()
   {
       $this->middleware('auth');
   }
    public function index()
	{
		return view('backend.media.index');
	}
	public function banner()
	{
		$datas = Banners::where('status','<>','3')->get();
		return view('backend.system.index',compact('datas'));
	}
	public function bannerAdd()
	{
		return view('backend.system.addbanner');
	}
	public function bannerEdit($id){

        $image = Banners::where('id',$id)->first();
		return view('backend.system.editbanner',compact('image'));
    }

	public function bannerpostEdit(Request $request){
		$this->validate($request,[
            'name' => 'required',
            'image' => 'required',
            'alt' => 'required',
        ],[
            'name.required' => 'Tên banner không được trống.',
            'image.required' => 'Ảnh không được trống.',
            'alt.required' => 'Alt không được trống.',
        ]);
        $request->merge([
            'link' => str_replace( asset('')."uploads/","",$request->image)
        ]);
        if (Banners::find($request->id)->update($request->all())) {
        	return redirect()->route('backend.banner')->with('success','Cập nhật danh mục '.$request->input('name').' thành công ! ');
        }else{
        	return redirect()->route('backend.banner')->with('success','Cập nhật không thành công ! ');
        }
    }

    public function bannerpostAdd(Request $request){
    	$this->validate($request,[
            'name' => 'required',
            'image' => 'required',
            'alt' => 'required',
        ],[
            'name.required' => 'Tên banner không được trống.',
            'image.required' => 'Ảnh không được trống.',
            'alt.required' => 'Alt không được trống.',
        ]);
        $request->merge([
            'link' => str_replace( asset('')."uploads/","",$request->image)
        ]);
        if (Banners::create($request->all())) {
        	return redirect()->route('backend.banner')->with('success','Thêm mới danh mục '.$request->input('name').' thành công ! ');
        }else{
        	return redirect()->route('backend.banner')->with('success','Thêm mới không thành công ! ');
        }
    }


    public function bannerDelete($id){
        
        $model = Banners::find($id);
        if($model && Banners::where(['id'=>$id])->delete()){
            return redirect()->route('backend.banner')->with('success','Xóa danh mục '.$model->name.' thành công ! ');
        }else{
            return redirect()->route('backend.banner')->with('error','Xóa danh mục '.$model->name.'không thành công ! ');
        }

    }
    public function logo()
    {
        $image = Banners::where('status','3')->first();
        return view('backend.system.logo',compact('image'));
    }
    public function logopostEdit(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'image' => 'required',
            'alt' => 'required',
        ],[
            'name.required' => 'Tên banner không được trống.',
            'image.required' => 'Ảnh không được trống.',
            'alt.required' => 'Alt không được trống.',
        ]);
        $request->merge([
            'link' => str_replace( asset('')."uploads/","",$request->image)
        ]);
        if (Banners::find($request->status)->update($request->all())) {
            return redirect()->route('backend.logo')->with('success','Cập nhật danh mục '.$request->input('name').' thành công ! ');
        }else{
            return redirect()->route('backend.logo')->with('success','Cập nhật không thành công ! ');
        }
    }

}

<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Cart;
use Auth;
use App\User;
use App\Role;
use App\Banners;
use App\Product;
use App\Category;
use App\Orders;
use App\Order_detail;

class CategoryController extends Controller
{
     /**
    * Create a new controller instance.
    *
    * @return void
    */
   public function __construct()
   {
       $this->middleware(function ($request, $next) {
        $this->user= Auth::user();
        if ($this->user->type != 'admin' || $this->user != null) {
            Auth::logout();
            return redirect()->route('login')->with('error','Bạn cần đăng nhập tài khoản admin ! ');
            }
        return $next($request);
        });
   }
    public function index()
    {
        $datas =Category::where('type','product')->orderBy('name')->paginate(20);
        $cats = Category::where('type','product')->Where('parent',0)->orderBy('name')->get();
    	return view('backend.product.category.index',compact('datas','cats'));
    }

    public function edit($id){
        
        $model = Category::find($id);
        if($model) {
            return view('backend.product.category.edit',[
                'model' => Category::find($id),
                'datas' => Category::where("type",'product')->orderBy('name')->paginate(20),
                'cats' => Category::where('type','product')->orderBy('name')->get(),
            ]);
        }else{
            return view('errors.404');
        }
        
    }

    public function postAdd(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'slug' => 'required'
        ],[
            'name.required' => 'Tên danh mục không được trống.',
            'slug.required' => 'Đường dẫn không được trống.',
        ]);
        
        if(Category::create([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'image' => $request->input('image'),
            'descriptions' => $request->input('descriptions'),
            'parent' => $request->input('parent'),
            'status' => $request->input('status'),
            'type' => 'product'
        ])){
            return redirect()->route('backend.product-category')->with('success','Thêm mới danh mục '.$request->input('name').' thành công ! ');
        }else{
            return redirect()->route('backend.product-category')->with('error','Thêm mới danh mục không thành công vui lòng xem lỗi ở dưới ! ');
        }

    }
    public function postEdit($id,Request $request){
        $this->validate($request,[
            'name' => 'required',
            'slug' => 'required'
        ],[
            'name.required' => 'Tên danh mục không được trống.',
            'slug.required' => 'Đường dẫn không được trống.',
        ]);

        Category::find($id)->update([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'image' => $request->input('image'),
            'descriptions' => $request->input('descriptions'),
            'parent' => $request->input('parent'),
            'status' => $request->input('status'),
            'type' => 'product'
        ]);

        return redirect()->route('backend.product-category')->with('success','Cập nhật danh mục '.$request->input('name').' thành công ! ');

    }

    public function postDelete($id){
        
        $model = Category::find($id);
        if($model && Category::where(['id'=>$id])->delete()){
            return redirect()->route('backend.product-category')->with('success','Xóa danh mục '.$model->name.' thành công ! ');
        }else{
            return redirect()->route('backend.product-category')->with('error','Xóa danh mục '.$model->name.'không thành công ! ');
        }

    }

    public function postDeleteAll(Request $request){
        $ids = $request->input('id');
        if(Category::destroy($ids)){
            return redirect()->route('backend.product-category')->with('success','Đã xóa '.count($ids).' danh mục thành công ! ');
        }else{
            return redirect()->route('backend.product-category')->with('error','Có lỗi khi xóa, vui lòng thử lại');
        }
    }
}

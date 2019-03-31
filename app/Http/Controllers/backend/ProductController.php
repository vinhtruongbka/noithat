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

class ProductController extends Controller
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
     public function home(Request $req)
    {
        $orderCount = Orders::count();
        $product = Product::count();
        $orders = Orders::orderBy('id','DESC')->paginate(10);
        if ($req->has('status')) {
            $orders = Orders::where('status',$req->status)->orderBy('id','DESC')->paginate(10);
        }
        return view('backend.home.index',compact('orders','product','orderCount'));
    }
    public function getProduct()
    {
        $product = Product::orderBy('id','DESC')->paginate(10);
    	return view('backend.product.index',compact('product'));
    }

    public function add(){
        $cats = Category::where('type','product')->orderBy('id','desc')->get();

        return view('backend.product.add',compact('cats'));
    }

    public function postAdd(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:product,name,'.$request->id,
            'slug' => 'required|unique:product,slug,'.$request->id,
            'price_input' => 'required',
            'cat_id' => 'required',
            'content' => 'required',
            'image' => 'required',
            'material' => 'required',
            'desc' => 'required',
        ],[
            'name.required' => 'Tên sản phẩm không được trống.',
            'slug.required' => 'Đường dẫn không được trống.',
            'price_input.required' => 'Giá sản phẩm không được trống.',
            'cat_id.required' => 'Danh mục sản phẩm không được trống.',
            'content.required' => 'Mô tả sản phẩm không được trống.',
            'name.unique' => 'Tên sản phẩm này đã tồn tại trong hệ thống.',
            'slug.unique' => 'Đường dẫn này đã tồn tại trong hệ thống.',
            'image.required' => 'Ảnh sản phẩm không được trống.',
            'material.required' => 'Chất liệu sản phẩm không được trống.',
            'desc.required' => 'Mô tả ngắn sản phẩm không được trống.',
        ]);
        $datas = $request->offsetUnset('_token');
        $request->merge([
            'user_id' => Auth::user()->id,
            'image' => str_replace( asset('')."uploads/","",$request->image)
        ]);
        $model = Product::create($request->all());
        return redirect()->route('backend.getProduct')->with('success','Thêm mới sản phâm thành công ! ');

    }

    public function edit($id){
        $model = Product::find($id);
        return view('backend.product.edit',[
            'model' => $model,
            'cats' => Category::where('type','product')->orderBy('name')->get(),
        ]);
    }

    public function postEdit($id,Request $request){
         $this->validate($request,[
            'name' => 'required|unique:product,name,'.$request->id,
            'slug' => 'required|unique:product,slug,'.$request->id,
            'price_input' => 'required',
            'cat_id' => 'required',
            'content' => 'required',
            'image' => 'required',
            'material' => 'required',
            'desc' => 'required',
        ],[
            'name.required' => 'Tên sản phẩm không được trống.',
            'slug.required' => 'Đường dẫn không được trống.',
            'price_input.required' => 'Giá sản phẩm không được trống.',
            'cat_id.required' => 'Danh mục sản phẩm không được trống.',
            'content.required' => 'Mô tả sản phẩm không được trống.',
            'name.unique' => 'Tên sản phẩm này đã tồn tại trong hệ thống.',
            'slug.unique' => 'Đường dẫn này đã tồn tại trong hệ thống.',
            'image.required' => 'Ảnh sản phẩm không được trống.',
            'material.required' => 'Chất liệu sản phẩm không được trống.',
            'desc.required' => 'Mô tả ngắn không được trống.',
        ]);

        $datas = $request->except('_token');

        $request->merge([
            'image' => str_replace( asset('')."uploads/","",$request->image)
        ]);
        Product::find($id)->update($request->all());
        return redirect()->route('backend.getProduct')->with('success','Cập nhật sản phâm thành công ! ');
    }

    public function deleteall(Request $request){
        $ids = $request->input('id');
        if(Product::destroy($ids)){
            return redirect()->route('backend.getProduct')->with('success','Đã xóa '.count($ids).' sản phâm thành công ! ');
        }else{
            return redirect()->route('backend.getProduct')->with('error','Có lỗi khi xóa, vui lòng thử lại');
        }
    }
    public function delete($id){
        if(Product::destroy($id)){
            return redirect()->route('backend.getProduct')->with('success','Đã xóa 1 sản phẩm thành công ! ');
        }else{
            return redirect()->route('backend.getProduct')->with('error','Có lỗi khi xóa, vui lòng thử lại');
        }
    }

    public function productHidden($id){
        if(Product::where('id','=',$id)->update(['status'=> 0])){
            return redirect()->route('backend.getProduct')->with('success','Đã ẩn một sản phẩm thành công! ');
        }else{
            return redirect()->route('backend.getProduct')->with('error','Có lỗi khi di chuyển, vui lòng thử lại');
        }
    }

    public function productShow($id){
        if(Product::where('id','=',$id)->update(['status'=> 1])){
            return redirect()->route('backend.getProduct')->with('success','Đã hiển thị một sản phẩm thành công! ');
        }else{
            return redirect()->route('backend.getProduct')->with('error','Có lỗi khi di chuyển, vui lòng thử lại');
        }
    }

    public function producthotHidden($id){
        if(Product::where('id','=',$id)->update(['hot'=> 0])){
            return redirect()->route('backend.getProduct')->with('success','Đã dừng sản phẩm bán chạy một sản phẩm thành công! ');
        }else{
            return redirect()->route('backend.getProduct')->with('error','Có lỗi khi di chuyển, vui lòng thử lại');
        }
    }

    public function producthotShow($id){
        if(Product::where('id','=',$id)->update(['hot'=> 1])){
            return redirect()->route('backend.getProduct')->with('success','Đã hiển thị sản phẩm bán chạy một sản phẩm thành công! ');
        }else{
            return redirect()->route('backend.getProduct')->with('error','Có lỗi khi di chuyển, vui lòng thử lại');
        }
    }

}

<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Orders;
use App\Order_detail;
use Auth;


class OrderController extends Controller
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
        if ($this->user == null || $this->user->type != 'admin') {
            Auth::logout();
            return redirect()->route('login')->with('error','Bạn cần đăng nhập tài khoản admin ! ');
            }
        return $next($request);
        });
   }
    public function index(Request $req)
	{
		$orders = Orders::orderBy('id','DESC')->paginate(10);
		if ($req->has('status')) {
			$orders = Orders::where('status',$req->status)->orderBy('id','DESC')->paginate(10);
		}
		return view('backend.product.order.index',[
			'datas' => $orders
		]);
	}

	public function detail($id)
	{
		return view('backend.product.order.view',[
			'model' => Orders::find($id)
		]);
	}


	public function update($id,$status)
	{
		if (Orders::find($id)->update(['status'=>$status])) {
			return redirect()->back()->with('success','Đã cập nhật trạng thái đơn hàng');
		}else{
			return redirect()->back()->with('error','Có lỗi khi cập nhật trạng thái đơn hàng');
		}
	}
}

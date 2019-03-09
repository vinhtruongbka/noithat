<?php

namespace App\Http\Controllers\cart;

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

class CartController extends Controller
{
     public function getIndex()
    {
		$carts = Cart::content();
    	return view('frontend.page.cart',compact('carts'));
    }

    public function postPurchase(Request $req)
    {
    	try {
    		$product = Product::where('id',$req->id)->first();
	    	Cart::add(
	    		array(
	    			'id'=>$product,
	    			'name'=>$product->name,
	    			'qty'=>1,
	    			'price'=>$product->price_input,
	    			'options' => ['image' => $product->image])
	    	);

    	return redirect()->route('Cart.getIndex')->with('info','Bạn đã thêm sản phẩm vào giỏ hàng thành công!');
    		
    	} catch (Exception $e) {

    		return redirect()->route('Fronted.getIndex')->with('info','Đã sảy ra lỗi khi đặt hàng,vui lòng đặt hàng lại!');
    	}
    }

     public function removeCart($rowId)
    {
    	if (!Auth::check()){
			return redirect()->route('User.getIndex')->with('info','Bạn chưa đăng ký hoặc đăng nhập!');
		}
		Cart::remove($rowId);

    	return redirect()->back()->with('info','Bạn đã xóa sản phẩm thành công');
    }

    public function getPay()
    {
        if (!Auth::check()){
         return redirect()->route('User.getIndex')->with('info','Bạn chưa đăng ký hoặc đăng nhập!');
        }

    	return view('frontend.page.order');
    }

    public function postPay(Request $req)
    {
        if (!Auth::check()){
         return redirect()->route('User.getIndex')->with('info','Bạn chưa đăng ký hoặc đăng nhập!');
        }
        $this->validate($req,[
            'name' =>'required|min:6',
             'phone' =>'required|min:10|max:10',
             'adress' =>'required'
        ],[
            'name.required' =>'Vui lòng nhập họ tên của bạn',
            'name.min' => 'Họ tên ít nhât 6 ký tự',
            'phone.required' =>'Vui lòng nhập số điện thoại của bạn',
            'phone.min' =>'Số điện thoại phải ít nhất 10 số',
            'phone.max' =>'Số điện thoại nhiều nhất là 10 số',
            'adress.required' =>'Vui lòng nhập địa chỉ của bạn'
        ]);

       try {

        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update([
                'name' => $req->name,
                'phone' =>$req->phone,
                'adress' => $req->adress
            ]);

        $orders = new Orders;
        $orders->user_id = Auth::user()->id;
        $orders->name = $req->name;
        $orders->email = Auth::user()->email;
        $orders->phone = $req->phone;
        $orders->address = $req->adress;
        $orders->save();
         $orderDetail = [];
         foreach (Cart::content() as $cart) {
            $orderDetail[] = [
                'order_id' => $orders->id,
                'product_id' => $cart->id->id,
                'quantity' => $cart->qty,
                'price' => $cart->price*$cart->qty
            ];
        }
        Order_detail::insert($orderDetail);
        Cart::destroy();
        return redirect()->route('Cart.getOrderSuccess')->with('info','Chúc mừng bạn đã đặt hàng thành công!');
           
       } catch (Exception $e) {

           return redirect()->route('Fronted.getIndex')->with('info','Đã sảy ra lỗi khi đặt hàng,vui lòng đặt hàng lại!');
       }
    }

    public function getOrderSuccess()
    {
        if (!Auth::check()){
         return redirect()->route('User.getIndex')->with('info','Bạn chưa đăng ký hoặc đăng nhập!');
        }

        $oders = Orders::where('user_id',Auth::user()->id)->first();
        if($oders == null){
            return redirect()->route('Fronted.getIndex')->with('info','Bạn chưa mua hàng,vui lòng chọn sản phẩm!');
        }
        $orderDetails = DB::table('order_detail')
            ->join('product', 'product.id', '=', 'order_detail.product_id')
            ->join('orders', 'orders.id', '=', 'order_detail.order_id')
            ->select('product.*', 'order_detail.quantity', 'order_detail.price','orders.status')
            ->where('orders.user_id',Auth::user()->id)
            ->get();

        return view('frontend.page.ordersuccess',compact('oders','orderDetails'));
    }
}

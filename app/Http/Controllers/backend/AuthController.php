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
use Mail;

class AuthController extends Controller
{
	
    public function login(){
		return view('auth.login');
	}
	public function forget(){
		return view('auth.forget');
	}
	public function postForgetPassword(Request $request)
    {

    	$this->validate($request,[
			'email' =>'required|email',
		],[
			'email.required' =>'Vui lòng nhập địa chỉ email của bạn',
			'email.email' =>'Địa chỉ mail không đúng định dạng',
		]);

 		try {
 			$auth = User::where('email',$request->email)->first();
 			if ($auth == null) {
 				return redirect()->route('login')->with('error','Email này không tồn tại!');
 			}
	 		$token = str_random(100);
	 		DB::table('users')
	            ->where('email', $request->email)
	            ->update([
	            	'remember_token' => $token
	            ]);

 		Mail::send('mail.mailbackend',[
	 			'name'=>$auth->name,
	 			'email'=>$request->email, 
	 			'token'=>$token
	 		], function($message) use($request,$auth){
	            $message->from(config('mail.from.address'),config('mail.from.name'));
	            $message->to($request->email);
	            $message->subject('Thông báo lấy lại mật khẩu!');
	        });
	        return redirect()->route('login')->with('success','Vui lòng kiểm mail '.$request->email.' để lấy lại mật khẩu');
 			
 		} catch (Exception $e) {
 			return redirect()->back()->with('error','Có lỗi, vui lòng thử lại');
 		}
	}


	public function postLogin(Request $request){
		$this->validate($request,[
			'email' => 'required|email',
			'password' => 'required'
		],[
			'email.required' =>'Vui lòng nhập địa chỉ email của bạn',
			'email.email' =>'Địa chỉ mail không đúng định dạng',
			'password.required' =>'Vui lòng nhập mật khẩu của bạn'
		]);

		if(Auth::attempt($request->only(['email','password']),$request->has('remember'))){
           if ($request->user()->authorizeRoles('admin')) {
              return redirect()->route('backend.home.index')->with('success','Bạn đã đăng nhập thành công');
           } else {
               return redirect()->back()->with('error','Bạn không có quyền truy cập trang này!');
           } 
        }else{
            return redirect()->back()->with('error','Email đăng nhập hoặc mật khẩu không đúng!');
        }
	}

	public function getPasswordToken(Request $request)
    {
    	return view('auth.get-password',[
			'token' => $request->token
		]);
    }

    public function postPasswordToken(Request $request){
    	$this->validate($request,[
			'password' =>'required|min:6',
			'confirm_password' =>'required|same:password',
		],[
			'password.required' =>'Vui lòng nhập mật khẩu của bạn',
			'password.min' =>'Mật khẩu ít nhât 6 ký tự',
			'confirm_password.required'=>"Vui lòng nhập lại mật khẩu của bạn",
			'confirm_password.same' =>'Nhập lại mật khẩu không dúng',
		]);
 		if ($request->token == '') {
 			return redirect()->back()->with('error','Vui lòng truy cập link có mã token');
		}
		
		$auth = User::where('remember_token',$request->token);
		if (!$auth->first() || $auth->first()->remember_token == '') {
 			return redirect()->back()->with('error','Mã token của bạn không hợp lệ');
		}

		try {
			$password = bcrypt($request->password);
			$request->offsetunset('password');
			$request->merge(['password'=>$password]);

			DB::table('users')
	            ->where('remember_token', $request->token)
	            ->update([
	            	'password' => $password,
	            	'remember_token' => ''
	            ]);

	    	return redirect()->route('login')->with('success','Bạn đã thay đổi mật khẩu thành công');
			
		} catch (Exception $e) {

			return redirect()->back()->with('error','Đã có lỗi vui lòng thử lại !');
		}
	}

}

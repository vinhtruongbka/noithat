<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;

class UserController extends Controller
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
    public function profile()
	{
		return view('backend.user.profile',['model'=> Auth::user()]);
	}

	public function postProfile(Request $request){
		$this->validate($request,[
			'name' =>'required|min:6',
			'email' =>'required',
			 'phone' =>'required|min:10|max:10',
		],[
			'name.required' =>'Vui lòng nhập họ tên của bạn',
			'email.required' =>'Vui lòng nhập họ email của bạn',
			'name.min' => 'Họ tên ít nhât 6 ký tự',
			'phone.required' =>'Vui lòng nhập số điện thoại của bạn',
			'phone.min' =>'Số điện thoại phải ít nhất 10 số',
			'phone.max' =>'Số điện thoại nhiều nhất là 10 số',

		]);
		if(User::where('id', Auth::user()->id)->update([
			'name' => $request->name,
			'phone' => $request->phone,
			'images'=>str_replace( asset('')."uploads/","",$request->image),
			'email' => $request->email,
			'facebook' => $request->facebook,
			'adress' => $request->adress,
		])){
			return redirect()->route('backend.user-profile')->with('success','Cập nhật thông tin thành công ! ');
		}else{
			return redirect()->route('backend.user-profile')->with('error','Đã có lỗi, vui lòng thử lại ! ');
		}
	}
	
	public function changePassword()
	{
		return view('backend.user.change-password');
	}

	public function postChangePassword(Request $request)
	{
		$this->validate($request,[
			'old-password' => 'required|AuthPassword',
            'password' => 'required|min:6',
            'confirm-password' => 'same:password'
		],[
			'old-password.required'=>'Bạn phải nhập mật khẩu cũ để chứng minh đây là tài khoản của bạn',
			'old-password.auth_password'=>'Vui lòng nhập chính xác mật khẩu cũ',
			'password.required' =>'Bạn cần nhập password mới',
			'password.min' =>'Mật khẩu mới cần ít nhất 6 ký tự',
			'confirm-password.same' =>'Nhập lại mật khẩu không dúng'
		]);
		$password = bcrypt($request->password);
		$request->offsetunset('password');
		$request->merge(['password'=>$password]);
		if(User::where('id', Auth::user()->id)->update([
			'password' => $password
		])){
			return redirect()->route('backend.user-profile')->with('success','Cập nhật thông tin thành công ! ');
		}else{
			return redirect()->back()->with('error','Đã có lỗi, vui lòng thử lại ! ');
		}
		
	}
}

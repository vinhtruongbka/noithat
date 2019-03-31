<?php

namespace App\Http\Controllers\user;

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

class UserController extends Controller
{
    public function getIndex()
    {
    	if (Auth::check()){
			return redirect()->route('User.getProfile')->with('info','Bạn đã đăng nhập thành công!');
		}
    	return view('frontend.page.register');
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
		if(!Auth::attempt($request->only(['email','password']),$request->has('remember'))){
			return redirect()->back()->with('infoLogin','Email đăng nhập hoặc mật khẩu không đúng!');
		}
		return redirect()->route('Fronted.getIndex')->with('info','Bạn đã đăng nhập thành công');
	}

	public function logout(){
		Auth::logout();
		Cart::destroy();
		return redirect()->route('Fronted.getIndex');
	}

	public function getProfile(){

		if (!Auth::check()){
			return redirect()->route('User.getIndex')->with('info','Bạn chưa đăng nhập! Vui lòng đăng nhập hoặc đăng ký tài khoản');
		}
		return view('frontend.page.profile');
	}

	public function postRegister(Request $req){
		$pass = $req->password;
		$email = $req->email;
		$this->validate($req,[
			'name' =>'required|min:6',
			'email' =>'required|email|unique:users,email',
			'password' =>'required|min:6',
			'confirm_password' =>'required|same:password',
			'phone' =>'required|min:10|max:10',
			 'adress' =>'required'
		],[
			'name.required' =>'Vui lòng nhập họ tên của bạn',
			'name.min' => 'Họ tên ít nhât 6 ký tự',
			'email.required' =>'Vui lòng nhập địa chỉ email của bạn',
			'email.email' =>'Địa chỉ mail không đúng định dạng',
			'password.required' =>'Vui lòng nhập mật khẩu của bạn',
			'password.min' =>'Mật khẩu ít nhât 6 ký tự',
			'confirm_password.same' =>'Nhập lại mật khẩu không dúng',
			'email.unique'=>'Địa chỉ email này đã tồn tại, vui lòng chọn email khác',
			'phone.required' =>'Vui lòng nhập số điện thoại của bạn',
			'phone.min' =>'Số điện thoại phải ít nhất 10 số',
			'phone.max' =>'Số điện thoại phải nhiều nhất 10 số',
			'adress.required' =>'Vui lòng nhập địa chỉ của bạn'
		]);

		$password = bcrypt($req->password);
		$req->offsetunset('password');
		$req->merge(['password'=>$password]);

	   $user = new User();
       $user->name = $req->name;
       $user->email = $email;
       $user->password = $password;
       $user->phone = $req->phone;
       $user->adress = $req->adress;
       $user->save();
       $user->roles()->attach(Role::where('name', 'user')->first());

	   Auth::attempt(['email' => $email,'password' => $pass]);

		return redirect()->route('Fronted.getIndex')->with('info','Bạn đã đăng ký tài khoản thành công');
	}

	public function updateProfile(Request $req){
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

	   DB::table('users')
            ->where('id', Auth::user()->id)
            ->update([
            	'name' => $req->name,
		        'phone' =>$req->phone,
		      	'adress' => $req->adress
            ]);

        return redirect()->back()->with('info','Bạn đã cập nhật thông tin thành công');
	}

	public function updatePassword(Request $req){
		$this->validate($req,[
			'old_password' => 'required|AuthPassword',
            'password' => 'required|min:6',
            'confirm-password' => 'same:password'
		],[
			'old_password.required'=>'Bạn phải nhập mật khẩu cũ để chứng minh đây là tài khoản của bạn',
			'old_password.auth_password'=>'Vui lòng nhập chính xác mật khẩu cũ',
			'password.required' =>'Bạn cần nhập password mới',
			'password.min' =>'Mật khẩu mới cần ít nhất 6 ký tự',
			'confirm-password.same' =>'Nhập lại mật khẩu không dúng'
		]);

		try {
			$password = bcrypt($req->password);
			$req->offsetunset('password');
			$req->merge(['password'=>$password]);
			
		   DB::table('users')
	            ->where('id', Auth::user()->id)
	            ->update([
	            	'password' => $password
	            ]);

	        return redirect()->back()->with('info','Bạn đã thay đổi mật khẩu thành công');
		} catch (Exception $e) {
			 return redirect()->back()->with('info','Đã có lỗi vui lòng thử lại !');
		}


	}

	public function forgetPassword()
    {

    	return view('frontend.page.forgetpassword');
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
 				return redirect()->route('User.getIndex')->with('info','Email này chưa đăng ký,vui lòng đăng ký tài khoản!');
 			}
	 		$token = str_random(100);
	 		DB::table('users')
	            ->where('email', $request->email)
	            ->update([
	            	'remember_token' => $token
	            ]);

 		Mail::send('mail.mailfb',[
	 			'name'=>$auth->name,
	 			'email'=>$request->email, 
	 			'token'=>$token
	 		], function($message) use($request,$auth){
	            $message->from(config('mail.from.address'),config('mail.from.name'));
	            $message->to($request->email);
	            $message->subject('Thông báo lấy lại mật khẩu!');
	        });
	        return redirect()->route('User.getIndex')->with('info','Vui lòng kiểm mail '.$request->email.' để lấy lại mật khẩu');
 			
 		} catch (Exception $e) {
 			return redirect()->back()->with('info','Có lỗi, vui lòng thử lại');
 		}
	}

	public function getPasswordToken(Request $request)
    {
    	return view('frontend.page.get-password',[
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
 			return redirect()->back()->with('info','Vui lòng truy cập link có mã token');
		}
		
		$auth = User::where('remember_token',$request->token);
		if (!$auth->first() || $auth->first()->remember_token == '') {
 			return redirect()->back()->with('info','Mã token của bạn không hợp lệ');
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

	    	return redirect()->route('User.getIndex')->with('info','Bạn đã thay đổi mật khẩu thành công');
			
		} catch (Exception $e) {

			return redirect()->back()->with('info','Đã có lỗi vui lòng thử lại !');
		}
	}

}

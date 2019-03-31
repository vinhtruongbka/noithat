<h3>Xin chào {{$name}}</h3>
<p>
	Bạn đang muốn lấy lại mật khẩu cho tài khoản, vui lòng click vào link dưới đây để nhập mật khẩu mới
</p>

<p>
	<a href="{{route('backend.getPasswordToken',['token'=>$token])}}" style="color: #ffff00">{{route('User.getPasswordToken',['token'=>$token])}}</a>
</p>
@extends('frontend.masster')
@section('contentFront')
<section class="my-breadcrumb">
	<div class="container">
		<div class="row">
			<ul class="breadcrumb my-breadcrumb-1">
				<li><a href="#">Trang Chủ</a></li>
				<li class="active">Đăng ký tài khoản</li>
			</ul>
		</div>
	</div>
</section>
<section class="chitiet">
	<div class="container">
		<div class="row">
			<div class="col-md-6">

				<form action="{{ route('User.postRegister') }}" method="POST" role="form">
					<legend style="font-weight: bold;">Đăng ký tài khoản</legend>

					<div class="form-group">
						<label for="">Họ tên <span style="color: red">(*)</span></label>
						<input type="text" class="form-control" id="" placeholder="Vui lòng nhập họ tên đầy đủ" name="name">
						@if ($errors->has('name'))
						<div class="help-block" style="color: red">
							{!!$errors->first('name')!!}
						</div>
						@endif
					</div>

					<div class="form-group">
						<label for="">Email <span style="color: red">(*)</span></label>
						<input type="text" class="form-control" id="" placeholder="Vui lòng nhập email của bạn" name="email">
						@if ($errors->has('email'))
						<div class="help-block" style="color: red">
							{!!$errors->first('email')!!}
						</div>
						@endif
					</div>
					<div class="form-group">
						<label for="">Điện thoại <span style="color: red">(*)</span></label>
						<input type="number" class="form-control" id="" placeholder="Nhập số điện thoại của bạn" name="phone">
						@if ($errors->has('phone'))
						<div class="help-block" style="color: red">
							{!!$errors->first('phone')!!}
						</div>
						@endif
					</div>
					<div class="form-group">
						<label for="">Mật khẩu<span style="color: red">(*)</span></label>
						<input type="password" class="form-control" id="" placeholder="Vui lòng nhập mật khẩu" name="password">
						@if ($errors->has('password'))
						<div class="help-block" style="color: red">
							{!!$errors->first('password')!!}
						</div>
						@endif
					</div>
					<div class="form-group">
						<label for="">Nhập lại mật khẩu<span style="color: red">(*)</span></label>
						<input type="password" class="form-control" id="" placeholder="Vui lòng nhập lại mật khẩu" name="confirm_password">
						@if ($errors->has('re_password'))
						<div class="help-block" style="color: red">
							{!!$errors->first('re_password')!!}
						</div>
						@endif
					</div>

					<div class="form-group">
						<label for="">Địa chỉ <span style="color: red">(*)</span></label>
						<textarea class="form-control" id="" placeholder="Vui lòng nhập địa chỉ của bạn" name="adress" style="height: 100px"></textarea>
						@if ($errors->has('adress'))
						<div class="help-block" style="color: red">
							{!!$errors->first('adress')!!}
						</div>
						@endif
					</div>
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<button type="submit" class="btn btn-primary">Đăng ký</button>
				</form>
			</div>
			<div class="col-md-6">
				<form action="{{ route('User.postLogin') }}" method="POST" role="form">
					<legend style="font-weight: bold;">Đăng nhập</legend>

					<div class="form-group">
						<label for="">Email <span style="color: red">(*)</span></label>
						<input type="email" class="form-control" id="" placeholder="Vui lòng nhập email của bạn" name="email">
						@if ($errors->has('email'))
						<div class="help-block" style="color: red">
							{!!$errors->first('email')!!}
						</div>
						@endif
					</div>
					<div class="form-group">
						<label for="">Mật khẩu <span style="color: red">(*)</span></label>
						<input type="password" class="form-control" id="" placeholder="Vui lòng nhập mật khẩu của bạn" name="password">
						@if ($errors->has('password'))
						<div class="help-block" style="color: red">
							{!!$errors->first('password')!!}
						</div>
						@endif
					</div>
					<div class="form-group">
						<div class="checkbox">
							<label>
								<input type="checkbox" value="" name="
								remember">
								Lưu thông tin đăng nhập
							</label>
						</div>
					</div>
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					@if (Session::has('infoLogin'))
					<div class="help-block"  style="color: red">
						{!! Session::get('infoLogin') !!}
					</div>
					@endif
					<button type="submit" class="btn btn-primary" style="background: red">Đăng nhập</button>
					<i class="fa fa-key" aria-hidden="true"></i> <a href="{{ route('User.forgetPassword') }}">Quên mật khẩu</a>
				</form>

			</div>

		</div>
	</div>
	</section
	@endsection
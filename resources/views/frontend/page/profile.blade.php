@extends('frontend.masster')
@section('contentFront')
<section class="my-breadcrumb">
	<div class="container">
		<div class="row">
			<ul class="breadcrumb my-breadcrumb-1">
				<li><a href="#">Trang Chủ</a></li>
				<li class="active">Thông tin cá nhân</li>
			</ul>
		</div>
	</div>
</section>
<section class="chitiet">
	<div class="container">
		<div class="row">
			<div class="col-md-6">

				<form action="{{ route('User.postProfile') }}" method="POST" role="form">
					<legend style="font-weight: bold;">Thông tin cá nhân</legend>

					<div class="form-group">
						<label for="">Họ tên <span style="color: red">(*)</span></label>
						<input type="text" class="form-control" name="name" value="{{Auth::user()->name}}"> 
						@if ($errors->has('name'))
						<div class="help-block" style="color: red">
							{!!$errors->first('name')!!}
						</div>
						@endif
					</div>

					<div class="form-group">
						<label for="">Email <span style="color: red">(*)</span></label>
						<input type="email" class="form-control" value="{{Auth::user()->email}}" name="email" disabled="true">
						@if ($errors->has('email'))
						<div class="help-block" style="color: red">
							{!!$errors->first('email')!!}
						</div>
						@endif
					</div>
					<div class="form-group">
						<label for="">Điện thoại <span style="color: red">(*)</span></label>
						<input type="number" class="form-control" value="{{Auth::user()->phone}}" name="phone">
						@if ($errors->has('phone'))
						<div class="help-block" style="color: red">
							{!!$errors->first('phone')!!}
						</div>
						@endif
					</div>
					<div class="form-group">
						<label for="">Địa chỉ <span style="color: red">(*)</span></label>
						<textarea class="form-control" name="adress" style="height: 130px">{{Auth::user()->adress}}</textarea>
						@if ($errors->has('adress'))
						<div class="help-block" style="color: red">
							{!!$errors->first('adress')!!}
						</div>
						@endif
					</div>
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<button type="submit" class="btn btn-primary">Cập nhật</button>
					<a href="{{ route('Cart.getOrderSuccess') }}" style="color: red;margin-left: 10px">Theo dõi đơn hàng</a>
				</form>
			</div>

			<div class="col-md-6">

				<form action="{{ route('User.updatePassword') }}" method="POST" role="form">
					<legend style="font-weight: bold;">Thay đổi mật khẩu</legend>
					<div class="form-group">
						<label for="">Email <span style="color: red">(*)</span></label>
						<input type="email" class="form-control" value="{{Auth::user()->email}}" name="email" disabled="true">
						@if ($errors->has('email'))
						<div class="help-block" style="color: red">
							{!!$errors->first('email')!!}
						</div>
						@endif
					</div>
					<div class="form-group">
						<label for="">Nhập mật khẩu cũ <span style="color: red">(*)</span></label>
						<input type="password" class="form-control" name="old_password" placeholder="Nhập mật khẩu cũ"> 
						@if ($errors->has('old_password'))
						<div class="help-block" style="color: red">
							{!!$errors->first('old_password')!!}
						</div>
						@endif
					</div>

					
					<div class="form-group">
						<label for="">Nhập mật khẩu mới <span style="color: red">(*)</span></label>
						<input type="password" class="form-control" placeholder="Nhập mật khẩu mới" name="password">
						@if ($errors->has('password'))
						<div class="help-block" style="color: red">
							{!!$errors->first('password')!!}
						</div>
						@endif
					</div>
					<div class="form-group">
						<label for="password">Nhập lại mật khẩu mới<span style="color: red">(*)</span></label>
						<input type="password" class="form-control" placeholder="Nhập lại mật khẩu mới" name="confirm-password">
						@if ($errors->has('confirm-password'))
						<div class="help-block" style="color: red">
							{!!$errors->first('confirm-password')!!}
						</div>
						@endif
					</div>
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<button type="submit" class="btn btn-primary">Cập nhật</button>
				</form>
			</div>
		</div>
	</div>
	</section
	@endsection
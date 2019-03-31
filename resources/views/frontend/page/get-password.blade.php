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
			<div class="col-md-6 col-md-offset-3">

				<form action="{{ route('User.postPasswordToken') }}" method="POST" role="form">
					<legend style="font-weight: bold;">Lấy lại mật khẩu</legend>
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
						<input type="password" class="form-control" placeholder="Nhập lại mật khẩu mới" name="confirm_password">
						@if ($errors->has('confirm_password'))
						<div class="help-block" style="color: red">
							{!!$errors->first('confirm_password')!!}
						</div>
						@endif
					</div>
					<input type="hidden" name="token" value="{{$token}}">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<button type="submit" class="btn btn-primary">Cập nhật</button>
				</form>
			</div>
		</div>
	</div>
	</section
	@endsection
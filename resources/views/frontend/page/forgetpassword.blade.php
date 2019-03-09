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
			<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Quên mật khẩu?</h2>
                  <p>Nhập email của bạn để lấy lại mật khẩu.</p>
                  <div class="panel-body">
    
                    <form action="{{ route('User.postForgetPassword') }}" id="register-form" role="form" autocomplete="off" class="form" method="post">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" placeholder="Nhập email của bạn" class="form-control"  type="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Lấy lại mật khẩu" type="submit">
                      </div>
                      
                      <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
		</div>
	</div>
	</section
	@endsection
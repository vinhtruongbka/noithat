@extends('auth.main')
@section('title','Đăng nhập hệ thống quản trị')
@section('content')
<form action="{{route('backend.postLogin')}}" method="post">
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <div class="form-group has-feedback">
    <input type="email" name="email" class="form-control" placeholder="Tài khoản">
    <span class="glyphicon glyphicon-user form-control-feedback"></span>
    <div class="clearfix"></div>
    @if($errors->has('email'))
    <div class="helper-block text-danger">
      {{ $errors->first('email') }}
    </div>
    @endif
  </div>
  <div class="form-group has-feedback">
    <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
     <div class="clearfix"></div>
      @if($errors->has('password'))
      <div class="helper-block text-danger">
       {{ $errors->first('password') }}
      </div>
    @endif
  </div>
  <div class="form-group has-feedback">
    <div class="col-xs-7">
      <div class="row">
        <div class="checkbox">
          <label>
            <input type="checkbox" name="remember"> Ghi nhớ mật khẩu
          </label>
        </div>
      </div>
    </div>
  <!-- /.col -->
    <div class="col-xs-5">
      <div class="row">
        <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
      </div>
    </div>
  <!-- /.col -->
  </div>
  
  
  
</form>
  <div class="clearfix"></div>
<div class="text-left">
   <a href="{{route('backend.forget')}}">Quên mật khẩu</a>
</div>
@stop()
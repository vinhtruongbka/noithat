@extends('auth.main')
@section('title','Lấy lại mật khẩu')
@section('content')
<form action="{{route('backend.postPasswordToken')}}" method="post">
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <input type="hidden" name="token" value="{{ $token }}">
  <div class="form-group has-feedback">
    <input type="password" name="password" class="form-control" placeholder="Mật khẩu mới">
    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    <div class="clearfix"></div>
    @if($errors->has('password'))
    <div class="helper-block text-danger">
      {{$errors->first('password')}}
    </div>
    @endif
  </div>
  <div class="form-group has-feedback">
    <input type="password" name="confirm_password" class="form-control" placeholder="Nhập lại mật khẩu mới">
    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
     <div class="clearfix"></div>
      @if($errors->has('confirm_password'))
      <div class="helper-block text-danger">
         {{$errors->first('confirm_password')}}
      </div>
    @endif
  </div>
  <div class="form-group has-feedback">
  <div class="text-center">
      
        <a href="{{route('login')}}" class="btn btn-default btn-flat">Đăng nhập</a>
        <button type="submit" class="btn btn-primary btn-flat">Thực hiện</button>
      
    </div>
  </div>
  
  
  
</form>
  <div class="clearfix"></div>
<div class="text-left">
   <a href="{{route('backend.forget')}}">Quên mật khẩu</a>
</div>
@stop()
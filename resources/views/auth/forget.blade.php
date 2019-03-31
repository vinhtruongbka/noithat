@extends('auth.main')
@section('title','Lấy lại mật khẩu')
@section('content')
<form action="{{route('backend.postForgetPassword')}}" method="post">
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <div class="form-group has-feedback">
    <input type="email" name="email" class="form-control" placeholder="Địa chỉ email">
    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    <div class="clearfix"></div>
    @if($errors->has('email'))
    <div class="helper-block text-danger">
      {{$errors->first('email')}}
    </div>
    @endif
  </div>
  
  <div class="form-group has-feedback">
    
  <!-- /.col -->
    <div class="text-center">
      
        <a href="{{route('login')}}" class="btn btn-default btn-flat">Đăng nhập</a>
        <button type="submit" class="btn btn-primary btn-flat">Thực hiện</button>
      
    </div>
  <!-- /.col -->
  </div>
</form>

@stop()
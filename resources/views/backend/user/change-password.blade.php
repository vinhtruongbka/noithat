@extends('backend.masster')
@section('title', 'Thay đổi mật khẩu')
@section('content')
<section class="content">
<form action="{{route('backend.postChangePassword')}}" method="POST" class="ng-pristine ng-valid">
  <div class="panel panel-default">
    <div class="panel-body">
      <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i></button>
      <button type="reset" class="btn btn-sm btn-default"><i class="fa fa-refresh"></i></button>
      <div class="box-tools pull-right">
          <ol class="breadcrumb">
           <li>
            <a href=""><i class="fa fa-home"> Trang chủ</i></a>
          </li>
          <li>
            <a href="{{route('backend.user-profile')}}"><i class="fa fa-key"> Thông tin tài khoản</i></a>
          </li>
         </ol>
       </div>
    </div>
  </div>
  <div class="form-horizontal" >
    <div class="form-group">
      <label for="old-password" class="col-sm-3 control-label">Mật khẩu cũ</label>
      <div class="col-sm-8">
        <input type="password" class="form-control" id="old-password" placeholder="Mật khẩu cũ.." name="old-password" />
         @if($errors->has('old-password'))
            <div class="help-block">{{ $errors->first('old-password') }}</div>
         @endif
      </div>
    </div>
    <div class="form-group">
      <label for="password" class="col-sm-3 control-label">Mật khẩu mới</label>
      <div class="col-sm-8">
        <input type="password" class="form-control" id="password" placeholder="Mật khẩu mới" name="password" />
         @if($errors->has('password'))
            <div class="help-block">{{ $errors->first('password') }}</div>
         @endif
      </div>
    </div>
    <div class="form-group">
      <label for="confirm-password" class="col-sm-3 control-label">Nhập lại</label>
      <div class="col-sm-8">
        <input type="password" class="form-control" id="confirm-password" placeholder="Nhập lại Mật khẩu mới" name="confirm-password" />
         @if($errors->has('confirm-password'))
            <div class="help-block">{{ $errors->first('confirm-password') }}</div>
         @endif
      </div>
    </div>
  </div>
<input type="hidden" name="_token" value="{{csrf_token()}}">
</form>
  </section>
@endsection
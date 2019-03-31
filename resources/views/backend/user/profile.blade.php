@extends('backend.masster')
@section('title', 'Thông tin tài khoản')
@section('content')
<section class="content">
<form action="{{route('backend.user-profile')}}" method="POST" class="ng-pristine ng-valid">
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
            <a href="{{route('backend.user-change-password')}}"><i class="fa fa-key"> Thay đổi mật khẩu</i></a>
          </li>
         </ol>
       </div>
    </div>
  </div>
  <div class="form-horizontal" >
  <div class="form-group">
    <label for="full_name" class="col-sm-3 control-label">Họ và tên</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="full_name" placeholder="Nhập Họ và tên" name="name" value="{{$model->name}}"/>
       @if($errors->has('name'))
          <div class="help-block">{{ $errors->first('name') }}</div>
       @endif
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="col-sm-3 control-label">Địa chỉ email</label>
    <div class="col-sm-8">
      <input type="email" class="form-control" id="email" placeholder="Nhập Địa chỉ email" name="email" value="{{$model->email}}" />
       @if($errors->has('email'))
          <div class="help-block">{{ $errors->first('email') }}</div>
       @endif
    </div>
  </div>
  <div class="form-group">
    <label for="phone" class="col-sm-3 control-label">Số điện thoại</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="phone" placeholder="Số điện thoại" name="phone" value="{{$model->phone}}" />
       @if($errors->has('phone'))
          <div class="help-block">{{ $errors->first('phone') }}</div>
       @endif
    </div>
  </div>
  <div class="form-group">
    <label for="phone" class="col-sm-3 control-label">Facebook</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="phone" placeholder="Facebook" name="facebook" value="{{$model->facebook}}" />
       @if($errors->has('facebook'))
          <div class="help-block">{{ $errors->first('facebook') }}</div>
       @endif
    </div>
  </div>
  <div class="form-group">
    <label for="phone" class="col-sm-3 control-label">Địa chỉ</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="phone" placeholder="Địa chỉ" name="adress" value="{{$model->adress}}" />
       @if($errors->has('adress'))
          <div class="help-block">{{ $errors->first('adress') }}</div>
       @endif
    </div>
  </div>
  <div class="form-group">
    <label for="phone" class="col-sm-3 control-label">Ảnh đại diện</label>
    <div class="col-sm-3">
      <input type="hidden" name="image" id="image" value="{{$model->images}}" />
      <div class="thumbnail" id="thumbnail">
        <a href="" class="remove-thumb"><i class="fa fa-times"></i></a>
        <a href="#" class="thumb" data-field="image" data-view="thumb-image">
          <img id="thumb-image" src="@if ($model->images != null)
            uploads/{{$model->images}}
          @else
            public/images/no-ig.png
          @endif" class="img-thumb">
        </a>
      </div>
        @if($errors->has('image'))
        <div class="help-block">{{ $errors->first('image') }}</div>
        @endif
    </div>
  </div>
</div>
<input type="hidden" name="_token" value="{{csrf_token()}}">
</form>
  </section>
@endsection
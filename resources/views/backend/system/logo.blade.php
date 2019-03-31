@extends('backend.masster')
@section('title', 'Chỉnh sửa logo')
@section('content')
<!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <form action="{{ route('backend.logo-add-edit-post') }}" method="POST">
        <div class="box-header with-border">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="btn-too-bar pull-left">
                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save "></i></button>
                <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
              </div>
              <div class="box-tools pull-right">
                <ol class="breadcrumb">
                 <li><a href=""></i> Trang chủ</a></li>
                 <li><a href="{{route('backend.logo')}}">Logo</a></li>
                 <li class="active">Sửa Logo</li>
               </ol>
             </div>
           </div>
         </div>
       </div>
       <div class="box-body">
        <div class="col-sm-6">
          <div class="row">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="form-group">
				<label for="title">Tiêu đề</label>
					<input type="text" name="name" class="form-control" value="{{$image->name}}" />
					@if($errors->has('name'))
				      <div class="help-block">{{ $errors->first('name') }}</div>
				    @endif
				</div>
				<div class="form-group">
					<label for="title">Alt</label>
					<input type="text" name="alt" class="form-control" value="{{$image->alt}}" />
					@if($errors->has('link'))
				      <div class="help-block">{{ $errors->first('link') }}</div>
				    @endif
				</div>
				<div class="form-group">
					<label for="title">Mô tả</label>
					<textarea name="descriptions" id="desc" class="form-control" rows="3">{{$image->descriptions}}</textarea>
					@if($errors->has('descriptions'))
				      <div class="help-block">{{ $errors->first('descriptions') }}</div>
				    @endif
				</div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="panel panel-default">
            <div class="panel-body">
				<div class="form-group">
					<label for="">Trạng thái</label>
					<div class="radio">
						<label>
							<input type="radio" name="status" value="3" checked="true">
							Hiển thị
						</label>
					</div>
				</div>
				<div class="form-group">
					<label for="title">Hình ảnh</label>
					<input type="hidden" name="image" class="form-control" id="image" value="{{$image->link}}" />
					<div class="thumbnail" id="thumbnail">
				      <a href="" class="remove-thumb" data-field="image" data-view="thumb-image"><i class="fa fa-times"></i></a>
				      <a href="#" class="thumb" data-field="image" data-view="thumb-image">
				      <img id="thumb-image" src="uploads/{{$image->link}}" class=""/>
				      </a>
				    </div>
				</div>
            </div>
          </div>
        </div>
      </div>
      <input type="hidden" name="_token" value="{{csrf_token()}}">
    </form>
    </div>
    <!-- /.box -->
  </section>

@endsection
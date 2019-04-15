@extends('backend.masster')
@section('title', 'Thêm mới sản phẩm')
@section('content')
<!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <form action="{{route('backend.product-edit',['id'=>$model->id])}}" method="POST">
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
                 <li><a href="{{route('backend.getProduct')}}">Sản phẩm</a></li>
                 <li class="active">Chỉnh sửa sản phẩm</li>
               </ol>
             </div>
           </div>
         </div>
       </div>
       <div class="box-body">
        <div class="col-sm-8">
          <div class="row">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="form-group">
                  <label class="control-label" for="name">Tên bài viết</label>
                  <input class="form-control" id="name" name="name" placeholder="Nhập tên bài viết..." type="text" value="{{$model->name}}">
                  @if($errors->has('name'))
                    <div class="help-block">{{ $errors->first('name') }}</div>
                  @endif
                </div>
                <div class="form-group">
                  <label class="control-label" for="slug">Đường dẫn tĩnh</label>
                  <input id="slug" name="slug" class="form-control" placeholder="Nhập tên quy tắc..." type="text" value="{{$model->slug}}">
                  @if($errors->has('slug'))
                    <div class="help-block">{{ $errors->first('slug') }}</div>
                  @endif
                </div>
                <div class="form-group">
                  <label class="control-label">Mô tả ngắn</label>
                  <textarea name="desc" class="form-control" rows="3">{{$model->desc}}</textarea>
                  @if($errors->has('desc'))
                  <div class="help-block">{{ $errors->first('desc') }}</div>
                  @endif
                </div>
                <div class="form-group">
                  <label class="control-label">Mô tả chi tiết</label>
                  <textarea class="form-control" id="content" name="content" rows="5">{{$model->content}}</textarea>
                  @if($errors->has('content'))
                    <div class="help-block">{{ $errors->first('content') }}</div>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="form-group">
                <label class="control-label">Trạng thái</label>
                <select name="status" id="status" class="form-control" required="required">
                  <option value="0" @if($model->status == 0) selected @endif>Hết hàng</option>
                  <option value="1" @if($model->status == 1) selected @endif>Còn hàng</option>
                </select>
              </div>
              <div class="form-group">
                <label class="control-label">Sản phẩm bán chạy</label>
                <select name="hot" id="hot" class="form-control" required="required">
                  <option value="0" @if($model->hot == 0) selected @endif>Không kích hoạt</option>
                  <option value="1" @if($model->hot == 1) selected @endif>Kích hoạt</option>
                </select>
              </div>
              <div class="form-group">
                <label class="control-label">Chất liệu</label>
                <input type="text" name="material" class="form-control" value="{{ $model->material }}">
                @if($errors->has('material'))
                  <div class="help-block">{{ $errors->first('material') }}</div>
                  @endif
              </div>
               <div class="form-group">
                <label class="control-label">Danh mục</label>
                {{radioCategory($cats,$model->cat_id)}}
                 @if($errors->has('cat_id'))
                    <div class="help-block">{{ $errors->first('cat_id') }}</div>
                 @endif
              </div>
              <div class="form-group">
                  <label class="control-label">Giá chính</label>
                  <input type="number" name="price_ouput" class="form-control" placeholder="Giá nhập..." value="{{$model->price_ouput}}">
                  @if($errors->has('price_ouput'))
                    <div class="help-block">{{ $errors->first('price_ouput') }}</div>
                  @endif
                </div>
                <div class="form-group">
                  <label class="control-label">Giá khuyến mãi</label>
                  <input type="number" name="price_input" class="form-control" placeholder="Giá bán..." value="{{$model->price_input}}">
                  @if($errors->has('price_input'))
                  <div class="help-block">{{ $errors->first('price_input') }}</div>
                @endif
                </div>
                <div class="form-group">
                  <label class="control-label">Chi phí sản xuất</label>
                  <input type="number" name="costs" class="form-control" value="{{$model->costs}}">
                </div>
                <div class="form-group">
                  <label class="control-label">Chi phí khác</label>
                <input type="number" name="OtherCosts" class="form-control" value="{{$model->OtherCosts}}">
                </div>
              <div class="form-group">
                 <label class="control-label">Hình ảnh</label>
                  <input type="hidden" name="image" id="image" value="{{$model->image}}" />
                   <div class="thumbnail" id="thumbnail">
                    <a href="" class="remove-thumb"><i class="fa fa-times"></i></a>
                    <a href="#" class="thumb" data-field="image" data-view="thumb-image">
                     <img id="thumb-image" src="uploads/{{$model->image}}" class="img-thumb">
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
@extends('backend.masster')
@section('title', 'Thêm mới sản phẩm')
@section('content')
<!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <form action="{{ route('backend.product-add') }}" method="POST">
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
                 <li class="active">Thêm mới sản phẩm</li>
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
                  <label class="control-label" for="name">Tên sản phẩm</label>
                  <input class="form-control" id="name" name="name" placeholder="Nhập tên sản phẩm..." type="text" value="{{old('name')}}">
                  @if($errors->has('name'))
                  <div class="help-block">{{ $errors->first('name') }}</div>
                  @endif
                </div>
                <div class="form-group">
                  <label class="control-label" for="slug">Đường dẫn tĩnh</label>
                  <input id="slug" name="slug" class="form-control" placeholder="Nhập tên quy tắc..." type="text" value="{{old('slug')}}">
                  @if($errors->has('slug'))
                  <div class="help-block">{{ $errors->first('slug') }}</div>
                  @endif
                </div>
                <div class="form-group">
                  <label class="control-label">Mô tả ngắn</label>
                  <textarea name="desc" class="form-control" rows="3"></textarea>
                  @if($errors->has('desc'))
                  <div class="help-block">{{ $errors->first('desc') }}</div>
                  @endif
                </div>
                <div class="form-group">
                  <label class="control-label">Mô tả chi tiết</label>
                  <textarea class="form-control" id="content" name="content" rows="5">{{old('content')}}</textarea>
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
                  <option value="0">Hết hàng</option>
                  <option value="1" selected>Còn hàng</option>
                </select>
              </div>
               <div class="form-group">
                <label class="control-label">Sản phẩm bán chạy</label>
                <select name="hot" id="hot" class="form-control" required="required">
                  <option value="0">Không kích hoạt</option>
                  <option value="1" selected>Kích hoạt</option>
                </select>
              </div>
              <div class="form-group">
                <label class="control-label">Chất liệu</label>
                <input type="text" name="material" class="form-control" placeholder="Chất liệu...">
                @if($errors->has('material'))
                  <div class="help-block">{{ $errors->first('material') }}</div>
                  @endif
              </div>
              <div class="form-group">
                <label class="control-label">Danh mục</label>
                {{radioCategory($cats)}}
                @if($errors->has('cat_id'))
                  <div class="help-block">{{ $errors->first('cat_id') }}</div>
                  @endif
              </div>
              <div class="form-group">
                <label class="control-label">Giá gốc</label>
                <input type="number" name="price_ouput" class="form-control" placeholder="Giá chính...">
              </div>
              <div class="form-group">
                <label class="control-label">Giá khuyến mãi</label>
                <input type="number" name="price_input" class="form-control" placeholder="Giá khuyến mãi...">
                @if($errors->has('price_input'))
                  <div class="help-block">{{ $errors->first('price_input') }}</div>
                  @endif
              </div>
              <div class="form-group">
                <label class="control-label">Chi phí sản xuất</label>
                <input type="number" name="Costs" class="form-control" placeholder="Chi phí sản xuất...">
              </div>
              <div class="form-group">
                <label class="control-label">Chi phí khác</label>
                <input type="number" name="OtherCosts" class="form-control" placeholder="Chi phí khác...">
              </div>
              <div class="form-group">
                <label class="control-label">Hình ảnh đại diện</label>
                <input type="hidden" name="image" id="image" />
                <div class="thumbnail" id="thumbnail">
                  <a href="" class="remove-thumb"><i class="fa fa-times"></i></a>
                  <a href="#" class="thumb" data-field="image" data-view="thumb-image">
                    <img id="thumb-image" src="public/images/no-ig.png" class="img-thumb">
                  </a>
                </div>
                @if($errors->has('image'))
                  <div class="help-block">{{ $errors->first('image') }}</div>
                  @endif
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
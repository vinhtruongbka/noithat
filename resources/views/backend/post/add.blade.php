@extends('backend.masster')
@section('title-icon', 'file-word-o')
@section('title', 'Thêm mới bài viêt')
@section('content')
<!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <form action="http://localhost/sv-shop/backend/post-add" method="POST">
            <div class="box-header with-border">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="btn-too-bar pull-left">
                  <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save "></i></button>
  <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
            </div>
            <div class="box-tools pull-right">
              <ol class="breadcrumb">
                 <li><a href="http://localhost/sv-shop/backend"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
  <li><a href="http://localhost/sv-shop/backend/post"><i class="fa fa-file-word-o"></i> Bài viết</a></li>
  <li class="active">Thêm mới bài viết</li>
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
    <input class="form-control" id="name" name="name" placeholder="Nhập tên bài viết..." type="text" value="">
      </div>
  <div class="form-group">
    <label class="control-label" for="slug">Đường dẫn tĩnh</label>
    <input id="slug" name="slug" class="form-control" placeholder="Nhập tên quy tắc..." type="text" value="">
      </div>
  <div class="form-group">
    <label class="control-label" for="slug">Video id</label>
    <input id="video_id" name="video_id" class="form-control" placeholder="Video id youtube..." type="text" value="">
      </div>
  <div class="form-group">
    <label class="control-label">Mô tả ngắn</label>
    <textarea class="form-control" id="desc" name="desc" rows="5"></textarea>
      </div>
  <div class="form-group">
    <label class="control-label">Mô tả đầy đủ</label>
    <textarea class="form-control" id="content" name="content" rows="5"></textarea>
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
      <option value="0">Không kích hoạt</option>
      <option value="1">Kích hoạt</option>
      <option value="2">Nổi bật</option>
    </select>
  </div>
   <div class="form-group">
    <label class="control-label">Danh mục</label>
    
  </div>
  <div class="form-group">
    <label class="control-label">Hình ảnh</label>
    <input type="hidden" name="image" id="image" />
    <div class="thumbnail" id="thumbnail">
    <a href="" class="remove-thumb"><i class="fa fa-times"></i></a>
    <a href="#" class="thumb" data-field="image" data-view="thumb-image">
      <img id="thumb-image" src="" class="img-thumb">
    </a>
    </div>
  </div>  
              </div>
            </div>
          </div>
      </div>
      <input type="hidden" name="_token" value="T7rRN2KxH0xezxoiqmkgnVY8WDaswoqCpLxxOxvf" />
    </form>
    </div>
    <!-- /.box -->
  </section>

@endsection
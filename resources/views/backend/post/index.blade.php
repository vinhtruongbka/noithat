@extends('backend.masster')
@section('title-icon', 'file-word-o')
@section('title', 'Quản lý bài viết')
@section('content')
<section class="content">
    <!-- Default box -->
    <div class="box">
      <form action="{{ route('backend.category-delete-all') }}" method="POST" class="ng-pristine ng-valid">
      <div class="box-header with-border">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="box-tools pull-left">
                  <a href="http://localhost/sv-shop/backend/post-add" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Thêm mới</a>
  <button class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')"><i class="fa fa-trash"></i> Xóa</button>
            </div>
            <div class="box-tools pull-right">
              <ol class="breadcrumb">
                <li>
    <a href="http://localhost/sv-shop/backend"><i class="fa fa-dashboard"></i> 
      Trang chủ
    </a>
  </li>
  <li class="active">Quản lý bài viết</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="box-body">
          <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
              <table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th width="15"><input type="checkbox" id="check-all"></th>
      <th>ID</th>
      <th>Tên bài viết</th>
      <th>Ngày tạo</th>
      <th>Trạng thái</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    </tbody>
</table>    
            </div>
          </div>
        </div>
                <div class="panel panel-default panel-pagination">
          <div class="panel-body">
            
          </div>
        </div>
              </div>
      <!-- /.box-body -->
     <input type="hidden" name="_token" value="tyGyQezlqwnNRNMKXqSxMsqhMtr3u3FNUnxGEwr5">
    </form>
    </div>
    <!-- /.box -->
  </section>
@endsection
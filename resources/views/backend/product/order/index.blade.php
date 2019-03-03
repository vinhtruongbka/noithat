@extends('backend.masster')
@section('title', 'Quản lý đơn hàng')
@section('content')
<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="box">
    <form action="http://localhost/sv-shop/backend/post-delete-all" method="POST" class="ng-pristine ng-valid">
      <div class="box-header with-border">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="box-tools pull-left">
              <a href="http://localhost/sv-shop/backend/order" class="btn btn-sm btn-danger">Tất cả</a>
              <a href="http://localhost/sv-shop/backend/order?status=0" class="btn btn-sm btn-danger">Chưa duyệt</a>
              <a href="http://localhost/sv-shop/backend/order?status=1" class="btn btn-sm btn-success">Đã duyệt</a>
              <a href="http://localhost/sv-shop/backend/order?status=2" class="btn btn-sm btn-primary">Đã giao hàng</a>
            </div>
            <div class="box-tools pull-right">
              <ol class="breadcrumb">
                <li>
                  <a href="http://localhost/sv-shop/backend"><i class="fa fa-home"></i> 
                    Trang chủ
                  </a>
                </li>
                <li class="active">Quản lý đơn hàng</li>
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
                    <th>Khách hàng</th>
                    <th>Ngày tạo</th>
                    <th>Tổng tiền</th>
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
      <input type="hidden" name="_token" value="FqG3FhhsIWxsti339pYVSy9A4B5oPtnZ3lyzwIVO">
    </form>
  </div>
  <!-- /.box -->
</section>

@endsection
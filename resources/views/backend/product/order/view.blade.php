@extends('backend.masster')
@section('title', 'Quản lý đơn hàng')
@section('content')
<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="box">
    <form action="" method="POST" class="ng-pristine ng-valid">
      <div class="box-header with-border">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="box-tools pull-left">
              <a href="{{route('backend.order')}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Quay lại danh sách</a>
            </div>
            <div class="box-tools pull-right">
              <ol class="breadcrumb">
                <li>
                  <a href=""><i class="fa fa-home"></i> 
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
                  <div class="col-md-6">
                    <h3>Chi tiết đơn hàng</h3>
                    <table class="table table-hover">
                        <tr>
                            <th>Mã</th>
                            <td>{{$model->id}}</td>
                        </tr>
                        
                        <tr>
                            <th>Ngày đặt</th>
                            <td>{{$model->created_at}}</td>
                        </tr>
                        <tr>
                            <th>Tổng tiền</th>
                            <td>{{price_fm($model->total_amount())}}</td>
                        </tr>
                         <tr>
                            <th>Tổng số lượng</th>
                            <td>{{$model->total_quantity()}}</td>
                        </tr>
                        <tr>
                            <th>Trạng thái</th>
                            <td>
                              @if($model->status == 1 || $model->status == 2)
                              @if($model->status == 1)
                                <span class="label label-success">Đã duyệt</span>
                                <a href="{{route('backend.order-status',['id'=>$model->id,'status'=>0])}}" title="Ẩn bài viết này" class="label label-danger" onclick="return confirm('Bạn có chắc muốn bỏ duyệt đơn hàng này?')">Bỏ duyệt</a>
                                <a href="{{route('backend.order-status',['id'=>$model->id,'status'=>2])}}" title="Ẩn bài viết này" class="label label-warning" onclick="return confirm('Bạn có chắc đơn hàng này đã giao?')">Đã giao hàng</a>
                              @else
                        <span class="label label-primary">Đã giao hàng</span>
                              @endif
                                
                              @else
                                <span class="label label-danger">Chưa duyệt</span>
                                <a href="{{route('backend.order-status',['id'=>$model->id,'status'=>1])}}" title="Hiển thị bài viết này" class="label label-success" onclick="return confirm('Bạn có chắc muốn duyệt đơn hàng này?')">Duyệt</a>
                              @endif
                            </td>
                        </tr>
                      </table>
                  </div>
                  <div class="col-md-6">
                    <h3>Chi tiết khách hàng</h3>
                    <table class="table table-hover">
                      <tr>
                              <th>Tên khách hàng</th>
                              <td>{{$model->user->name}}</td>
                          </tr>
                          <tr>
                              <th>Email</th>
                              <td>{{$model->user->email}}</td>
                          </tr>
                          <tr>
                              <th>Điện thoại</th>
                              <td>{{$model->user->phone}}</td>
                          </tr>
                          <tr>
                              <th>Địa chỉ</th>
                              <td>{{$model->user->address}}</td>
                          </tr>
                    </table>
                  </div>
                </div>

                    <div class="clearfix"></div>
                    <h3>Chi tiết sản phẩm</h3>
                    <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                       @foreach($model->details as $k => $item)
                      <tr>
                        <td>{{$k+1}}</td>
                        <td>
                          <img src="uploads/{{$item->product->image}}" alt="" width="60">
                        </td>
                        <td>{{$item->product->name}}</td>
                        <td>{{price_fm($item->price)}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>
                          <a target="_blank" href="{{ route('Fronted.getProduct',$item->product->slug.'-'.$item->product->id) }}" class="btn btn-xs btn-link">Xem sản phẩm</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
          </div>
        </div>
        <div class="panel panel-default panel-pagination">
          <div class="panel-body">
            
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <input type="hidden" name="_token" value="{{csrf_token()}}">
    </form>
  </div>
  <!-- /.box -->
</section>

@endsection
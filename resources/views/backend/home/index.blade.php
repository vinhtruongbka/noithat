@extends('backend.masster')
@section('title-icon','home')
@section('title','Bảng điều khiển')
@section('content')

<section class="content">
    <!-- Default box -->
    <div class="box">
            <div class="box-body">
          <div class="panel panel-default">
          <div class="panel-body">
                               <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        {{-- <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>0</h3>
              <p>Bài viết</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="backend/post" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div> --}}
        <!-- ./col -->
        <div class="col-md-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $orderCount }}</h3>
              <p>Đơn hàng</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="backend/order" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        {{-- <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>0</h3>
              <p>Khách hàng</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div> --}}
        <!-- ./col -->
        <div class="col-md-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ $product }}</h3>
              <p>Sản phẩm</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="backend/product" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12">
          <!-- TO DO List -->
          <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>
              <h3 class="box-title">Đơn hàng mới</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Khách hàng</th>
                    <th>Ngày tạo</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th></th>
                  </tr>
                </thead>
                @foreach($orders as $order)
                  <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->name}}</td>
                    <td>{{$order->created_at}}</td>
                     <td>{{price_fm($order->total_amount())}}</td>
                    <td>
                      @if($order->status == 1)
                        <span class="label label-success">Đã duyệt</span>
                        <a href="{{route('backend.order-status',['id'=>$order->id,'status'=>0])}}" title="Ẩn bài viết này" class="label label-danger" onclick="return confirm('Bạn có chắc muốn bỏ duyệt đơn hàng này?')">Bỏ duyệt</a>

                      @elseif($order->status == 2)
                        <span class="label label-primary">Đã giao hàng</span>
                      @else
                        <span class="label label-danger">Chưa duyệt</span>
                        <a href="{{route('backend.order-status',['id'=>$order->id,'status'=>1])}}" title="Hiển thị bài viết này" class="label label-success" onclick="return confirm('Bạn có chắc muốn duyệt đơn hàng này?')">Duyệt</a>
                      @endif
                    </td>
                    <td align="center" class="table-action">
                      <a href="{{route('backend.order-detail',['id'=>$order->id])}}" title="Chỉnh sửa bài viết" class="label label-default">
                       <i class="fa fa-eye"></i>
                      </a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
              <div class="clearfix"></div>
              {{ $orders->links() }}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <!-- quick email widget -->
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <!--  -->
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
                      </div>
        </div>
      </div>
    </div>
    <!-- /.box -->
  </section>
@endsection
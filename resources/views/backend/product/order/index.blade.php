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
              <a href="{{route('backend.order')}}" class="btn btn-sm btn-danger">Tất cả</a>
              <a href="{{route('backend.order',['status' => 0])}}" class="btn btn-sm btn-danger">Chưa duyệt</a>
              <a href="{{route('backend.order',['status' => 1])}}" class="btn btn-sm btn-success">Đã duyệt</a>
              <a href="{{route('backend.order',['status' => 2])}}" class="btn btn-sm btn-primary">Đã giao hàng</a>
            </div>
            <div class="box-tools pull-right">
              <ol class="breadcrumb">
                <li>
                  <a href="/backend"><i class="fa fa-home"></i> 
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
                @foreach($datas as $order)
                  <tr>
                    <td><input type="checkbox" name="id[]" class="item-check" value="{{$order->id}}"></td>
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
            </div>
          </div>
        </div>
        {{ $datas->links() }}
      <!-- /.box-body -->
      <input type="hidden" name="_token" value="{{csrf_token()}}">
    </form>
  </div>
  <!-- /.box -->
</section>

@endsection
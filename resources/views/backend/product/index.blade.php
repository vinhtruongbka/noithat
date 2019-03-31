@extends('backend.masster')
@section('title', 'Quản lý sản phẩm')
@section('content')
<section class="content">
    <!-- Default box -->
    <div class="box">
      <form action="{{ route('backend.product-delete-all') }}" method="POST" class="ng-pristine ng-valid">
      <div class="box-header with-border">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="box-tools pull-left">
              <a href="{{ route('backend.product-add') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Thêm mới</a>
              <button class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')"><i class="fa fa-trash"></i> Xóa</button>
            </div>
            <div class="box-tools pull-right">
              <ol class="breadcrumb">
                <li>
                  <a href=""><i class="fa fa-dashboard"></i> 
                    Trang chủ
                  </a>
                </li>
                <li class="active">Quản lý sản phẩm</li>
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
                  <th width="15" style="padding-left: 15px"><input type="checkbox" id="check-all"></th>
                  <th>ID</th>
                  <th>Tên sản phẩm</th>
                  <th>Ngày tạo</th>
                  <th>Bán chạy</th>
                  <th>Trạng thái</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($product as $post)
                <tr>
                  <td style="padding-left: 15px"><input type="checkbox" name="id[]" class="item-check" value="{{$post->id}}"></td>
                  <td>{{$post->id}}</td>
                  <td>{{$post->name}}</td>
                  <td>{{$post->created_at}}</td>
                   <td>
                    @if($post->hot == 1)
                    <span class="label label-success">Đang kích hoạt</span>
                    <a href="{{ route('backend.producthotHidden',$post->id) }}" title="Ẩn bài viết này" class="label label-danger">Hủy</a>
                    @else
                    <span class="label label-danger">Đang ẩn</span>
                    <a href="{{ route('backend.producthotShow',$post->id) }}" title="Hiển thị bài viết này" class="label label-success">Kích hoạt</a>
                    @endif
                  </td>
                  <td>
                    @if($post->status == 1)
                    <span class="label label-success">Đang còn hàng</span>
                    <a href="{{ route('backend.productHidden',$post->id) }}" title="Ẩn bài viết này" class="label label-danger">Hết hàng</a>
                    @else
                    <span class="label label-danger">Đang hết hàng</span>
                    <a href="{{ route('backend.productShow',$post->id) }}" title="Hiển thị bài viết này" class="label label-success">Còn hàng</a>
                    @endif
                  </td>
                  <td align="center" class="table-action">
                    <a href="{{route('backend.product-edit',['id'=>$post->id])}}" title="Chỉnh sửa bài viết" class="label label-default">
                      <i class="fa fa-edit"></i>
                    </a>
                    <a href="{{route('backend.product-delete',['id'=>$post->id])}}" title="Chỉnh sửa bài viết" class="label label-danger" onclick="return confirm('Bạn có chác chắn muốn xóa bài viết này ?')">
                      <i class="fa fa-trash"></i>
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>    
          </div>
        </div>
      </div>
      {{ $product->links() }}
    </div>
      <!-- /.box-body -->
      <input type="hidden" name="_token" value="{{csrf_token()}}">
    </form>
    </div>
    <!-- /.box -->
  </section>
@endsection
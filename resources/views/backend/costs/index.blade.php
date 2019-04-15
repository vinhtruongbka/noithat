@extends('backend.masster')
@section('title', 'Quản lý chi phí')
@section('content')
<section class="content">
    <!-- Default box -->
    <div class="box">
      <form action="{{ route('backend.product-delete-all') }}" method="POST" class="ng-pristine ng-valid">
      <div class="box-header with-border">
        <div class="panel panel-default">
          <div class="panel-body">
            {{-- <div class="box-tools pull-left">
              <a href="{{ route('backend.product-add') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Thêm mới</a>
              <button class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')"><i class="fa fa-trash"></i> Xóa</button>
            </div> --}}
            <div class="box-tools pull-right">
              <ol class="breadcrumb">
                <li>
                  <a href=""><i class="fa fa-dashboard"></i> 
                    Trang chủ
                  </a>
                </li>
                <li class="active">Quản lý chi phí</li>
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
                  <th style="text-align: center">ID</th>
                  <th>Tên sản phẩm</th>
                  <th>Chi phí sản xuất</th>
                  <th>Chi phí khác</th>
                  <th>Giá bán</th>
                  <th>Tổng chi phí</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($product as $post)
                <tr>
                  <td style="text-align: center">{{$post->id}}</td>
                  <td>{{$post->name}}</td>
                  <td>{{ $post->costs !=null ? number_format($post->costs) : 0 }}₫</td>
                   <td>
                    {{ $post->costs !=null ? number_format($post->OtherCosts) : 0 }}₫
                  </td>
                  <td>
                    {{number_format($post->price_ouput)}}₫
                  </td>
                  <td>
                    {{ number_format($post->costs+$post->OtherCosts) }}₫
                  </td>
                  <td align="center" class="table-action">
                    <a href="{{route('backend.product-edit',['id'=>$post->id])}}" title="Chỉnh sửa bài viết" class="label label-default">
                      <i class="fa fa-edit"></i>
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
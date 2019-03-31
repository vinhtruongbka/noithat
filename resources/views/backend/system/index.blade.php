@extends('backend.masster')
@section('title', 'Quản lý banner')
@section('content')
<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="box-tools pull-left">
              <a href="{{ route('backend.banner-add') }}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Thêm mới</a>
            </div>
            <div class="box-tools pull-right">
              <ol class="breadcrumb">
                <li>
                  <a href=""><i class="fa fa-dashboard"></i> 
                    Trang chủ
                  </a>
                </li>
                <li class="active">Quản lý banner</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    <div class="box-body">
      <div class="row">
       @if($datas->count())
       @foreach($datas as $banner)
       <div class="col-md-4 course-data-item">
        <div class="box box-widget">
          <div class="box-body no-padding">
            <img class="img-responsive" src="uploads/{{$banner->link}}" alt="Photo">
          </div>
          <div class="box-footer">
            <div class="pull-left">
              <a href="{{route('backend.banner-add-edit',['id'=>$banner->id])}}" class="btn btn-success btn-xs"><i class="fa fa-share"></i> Sửa</a>
              <a href="{{route('backend.banner-delete',['id'=>$banner->id])}}" class="btn btn-danger btn-xs" onclick="return confirm('Bạn có chắc xóa')"><i class="fa fa-trash"></i> Xóa</a>
            </div>
            <div class="pull-right">
              <span class="">Tạo ngày: {{$banner->created_at}}</span>
            </div>
          </div>
          <div class="box-header with-border">
            <h3 class="box-title">{{$banner->name}}</h3>
          </div>
        </div>
      </div>
      @endforeach
      @endif
      </div>
</div>

</div>
<!-- /.box -->
</section>

@endsection
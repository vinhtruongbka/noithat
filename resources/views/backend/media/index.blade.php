@extends('backend.masster')
@section('title', 'Quản lý hình ảnh')
@section('content')
<section class="content">
  <div class="panel panel-default">
      <div class="panel-body">
        <div class="box-tools pull-right">
          <ol class="breadcrumb">
           <li><a href=""><i class="fa fa-dashboard"></i> Trang chủ</a></li>
           <li class="active">Quản lý hình ảnh</li>
         </ol>
       </div>
     </div>
   </div>
  <div class="form-horizontal">
    <iframe src="{{url('/')}}/file/dialog.php" style="border: 0; height:500px; overflow-y: auto; overflow-x:none;width: 100%"></iframe>
  </div>
  </section>
@endsection

<!DOCTYPE html>
<html ng-app="bkap" ng-controller="BkapBackend">
<head>
  <base href="{{ asset('') }}">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin - Bảng điều khiển</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shortcut icon" type="image/x-icon" href="public/images/logo.png" />
  <meta name="_token" content="EpofSi8VYPUMKbvW64FjogkhtjogGZ0xqe9gYtkl" />
  <link rel="stylesheet" href="public/css/bootstrap.min.css">
  <link rel="stylesheet" href="public/css/font-awesome.min.css">
  <link rel="stylesheet" href="public/css/AdminLTE.css">
  <link rel="stylesheet" href="public/css/_all-skins.min.css">
  <link rel="stylesheet" href="public/css/jquery-ui.css">
  <link rel="stylesheet" href="public/css/style.css" />
  <script type="text/javascript">
    function base_url(){
      return "<?php echo url('/');?>";
    }
  </script>
  <script type="text/javascript">
  var old_img = '';
</script>
  </head>
<body class="skin-blue sidebar-mini sidebar-collapse">
<div class="wrapper">
@include('backend.header')
@include('backend.sidebar')
<div class="content-wrapper">
<section class="content-header">
    <h1>
      @if(trim($__env->yieldContent('title-icon')))
      <span class="fa fa-@yield('title-icon')"></span>
      @endif
      @if(trim($__env->yieldContent('title')))
      @yield('title')
      @endif
      @if(trim($__env->yieldContent('sub-title')))
      <small>@yield('sub-title')</small>
      @endif
      @if(isset($helper))
         <a title="Xem trợ giúp" data-toggle="modal" href="#helper">
           <span class="badge"><i class="fa fa-question"></i></span>
         </a>
      @endif
    </h1>
    @if(trim($__env->yieldContent('breadcrumb')))
    <ol class="breadcrumb">
     @yield('breadcrumb')
    </ol>
    @endif
  </section>

  <!-- Main content -->
  @yield('content')
  <!-- /.content -->
</div>  <!-- /.content-wrapper -->
@include('backend.footer')
</div>
<!-- ./wrapper -->

<script src="public/js/jquery.min.js"></script>
<script src="public/js/jquery-ui.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/adminlte.min.js"></script>
<script src="public/js/dashboard.js"></script>
<script src="public/tinymce/tinymce.min.js"></script>
<script src="public/tinymce/config.js"></script>
<script src="public/js/function.js"></script>

<div class="modal fade" id="modal-file">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Quản lý ảnh</h4>
      </div>
      <div class="modal-body">
       
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="helper">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Trợ giúp</h4>
      </div>
      <div class="modal-body">
              </div>
    </div>
  </div>
</div>
</body>
</html>

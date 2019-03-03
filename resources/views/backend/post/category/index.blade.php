@extends('backend.masster')
@section('title', 'Quản lý danh mục bài viết')
@section('content')
<!-- Main content -->
<section class="content">
  <!-- Default box -->
  <div class="box">
    <div class="box-body">
      <div class="row">
       <div class="col-md-4">
        <form action="http://localhost/sv-shop/backend/category-add" method="POST" class="ng-pristine ng-valid">
          <div class="panel panel-default">
            <div class="panel-body">
              <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i></button>
              <button type="reset" class="btn btn-sm btn-default"><i class="fa fa-refresh"></i></button>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="form-group">
                <label class="control-label" for="name">Tên danh mục</label>
                <input class="form-control" id="name" name="name" placeholder="Nhập tên danh mục ..." type="text" value="">
              </div>
              <div class="form-group">
                <label class="control-label" for="slug">Đường dẫn tĩnh</label>
                <input id="slug" name="slug" class="form-control" placeholder="Nhập đờng dẫn tĩnh<..." type="text" value="">
              </div>
              <div class="form-group">
                <label class="control-label">Danh mục cha</label>
                <select name="parent" id="inputParent" class="form-control" required="required">
                 <option value="0">Không có</option>
                 
               </select>
             </div>
             <div class="form-group">
               <label class="control-label">Hình ảnh</label>
               <input type="hidden" name="image" id="image">
               <div class="thumbnail" id="thumbnail">
                <a href="" class="remove-thumb"><i class="fa fa-times"></i></a>
                <a href="#" class="thumb" data-field="image" data-view="thumb-view">
                 <img id="thumb-view" src="http://localhost/sv-shop/public/images/no-ig.png" class="img-thumb">
               </a>
             </div>
           </div>
           <div class="form-group">
            <label class="control-label">Thứ tự</label>
            <input class="form-control" id="ordering" name="ordering" placeholder="Nhập thứ tự sắp xếp ..." type="text" value="">
          </div>
          <div class="form-group">
            <label class="control-label">Mô tả</label>
            <textarea name="descriptions" class="form-control" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label class="control-label">Trạng thái</label>
            <select name="status" id="inputParent" class="form-control">
             <option value="0">Không kích hoạt</option>
             <option value="1" selected="">Kích hoạt</option>
             <option value="2">Ở trang chủ</option>
           </select>
         </div>
       </div>
     </div>
     
     <input type="hidden" name="_token" value="jmKtncSOoMjCxhDhmrgPJIbCb6VpS6zYrGcvECfG">
   </form>
 </div>
 <div class="col-md-8">
  <form action="http://localhost/sv-shop/backend/category-delete-all" method="POST" class="ng-pristine ng-valid">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="box-tools pull-left">
          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc muốn xóa các lựa chọn ?')"><i class="fa fa-trash"></i> Xóa lựa chọn</button>
        </div>
        <div class="box-tools pull-right">
          <ol class="breadcrumb">
           <li><a href="http://localhost/sv-shop/backend"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
           <li class="active">Quản lý danh mục</li>
         </ol>
       </div>
     </div>
   </div>
   <div class="panel panel-default">
    <div class="panel-body">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th width="15"><input type="checkbox" id="check-all"></th>
            <th>Tên danh mục</th>
            <th>Ngày tạo</th>
            <th align="center">Hành động</th>
          </tr>
        </thead>
        <tbody>
          
        </tbody>
      </table>
    </div>
  </div>
  <div class="panel panel-default panel-pagination">
    <div class="panel-body">
      
    </div>
  </div>
  
  <input type="hidden" name="_token" value="jmKtncSOoMjCxhDhmrgPJIbCb6VpS6zYrGcvECfG">
</form>
</div>

</div>
</div>

</div>
<!-- /.box -->
</section>

@endsection
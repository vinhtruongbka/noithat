<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">


        <img src="uploads/{{Auth::user()->images}}" class="img-circle" alt="User Image" style="width: 35px">
      </div>
      <div class="pull-left info">
        <p>{{Auth::user()->name}}</p>
        <a href="backend/user-profile"><i class="fa fa-circle text-success"></i> Thông tin</a>
      </div>
    </div>
    <!-- Kiểm tra và duyệt menu leval 1 -->
    <!--isset -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class=" active">
        <a href=" backend ">
          <i class="fa fa-home"></i> <span>Trang chủ</span>
        </a>
        <!-- Kiểm tra và duyệt menu leval 2 -->
      </li>
      <!-- endif canDo -->
      
      <!-- endif canDo -->
      <!-- endif canDo -->
      <!-- endif canDo -->
      <li class="treeview">
        <a href="">
          <i class="fa fa-cart-plus"></i><span>Quản lý bán hàng</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        </a>
        <!-- Kiểm tra và duyệt menu leval 2 -->
        <ul class="treeview-menu">
          <li class=""><a href="{{ route('backend.getProduct') }}"><i class="fa fa-external-link-square"></i> <span>Danh sách sản phẩm</span></a>
            <!-- Kiểm tra và duyệt menu leval 3 -->
          </li>
          <!-- endif itemcanDo -->
          <li class=""><a href=" backend/product-category "><i class="fa fa-external-link-square"></i> <span>Danh mục</span></a>
            <!-- Kiểm tra và duyệt menu leval 3 -->
          </li>
          <!-- endif itemcanDo -->
          <li class=""><a href=" {{ route('backend.order') }} "><i class="fa fa-external-link-square"></i> <span>Đơn hàng</span></a>
            <!-- Kiểm tra và duyệt menu leval 3 -->
          </li>
          <!-- endif itemcanDo -->
          <!-- endforeach items -->
        </ul>
      </li>
      {{-- end produc --}}
      <li class=" treeview">
        <a href="">
          <i class="fa fa-folder-open"></i> <span>Quản lý files</span>
        </a>
        <!-- Kiểm tra và duyệt menu leval 2 -->
        <ul class="treeview-menu">
          <li class=""><a href="{{ route('backend.media') }}"><i class="fa fa-external-link-square"></i> <span>Ảnh</span></a>
            <!-- Kiểm tra và duyệt menu leval 3 -->
          </li>
        </ul>
      </li>
      {{-- end media --}}
      <li class="treeview">
        <a href="">
          <i class="fa fa-users"></i><span>Tài khoản quản trị</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        </a>
        <!-- Kiểm tra và duyệt menu leval 2 -->
        <ul class="treeview-menu">
          <!-- endif itemcanDo -->
          <li class=""><a href="{{ route('backend.user-profile') }}"><i class="fa fa-check"></i> <span>Thông tin cá nhân</span></a>
            <!-- Kiểm tra và duyệt menu leval 3 -->
          </li>
          <!-- endif itemcanDo -->
          <li class=""><a href=" backend/user-change-password "><i class="fa fa-check"></i> <span>Thay đổi mật khảu</span></a>
            <!-- Kiểm tra và duyệt menu leval 3 -->
          </li>
          <!-- endif itemcanDo -->
          <!-- endforeach items -->
        </ul>
      </li>
      <!-- endif canDo -->
      <!-- endif canDo -->
      <!-- endforeach backMenus -->
      <li class="treeview">
        <a href="">
          <i class="fa fa-cog"></i><span>Cài đặt</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        </a>
        <!-- Kiểm tra và duyệt menu leval 2 -->
        <ul class="treeview-menu">
          <li class=""><a href="{{ route('backend.banner') }}"><i class="fa fa-external-link-square"></i> <span>Banner</span></a>
            <li class=""><a href="{{ route('backend.logo') }}"><i class="fa fa-external-link-square"></i> <span>Logo</span></a>
            <!-- Kiểm tra và duyệt menu leval 3 -->
          </li>
        </ul>
      </li>
      <li class="">
        <a href="">
          <i class="fa fa-line-chart"></i> <span>Báo cáo</span>
        </a>
        <!-- Kiểm tra và duyệt menu leval 2 -->
        <ul class="treeview-menu">
          <li class=""><a href="{{ route('backend.getCosts') }}"><i class="fa fa-external-link-square"></i> <span>Chi phí</span></a>
            <li class=""><a href="{{ route('backend.getCostsdetail') }}"><i class="fa fa-external-link-square"></i> <span>Sản phẩm đã bán</span></a>
            <!-- Kiểm tra và duyệt menu leval 3 -->
          </li>
        </ul>
      </li>
      
    </ul>
    <!-- end isset backMenus -->
    <!--endif auth check -->
  </section>
  <!-- /.sidebar -->
</aside>
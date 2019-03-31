<header class="main-header">
  <!-- Logo -->
  <a href="backend" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><img src="https://www.gravatar.com/avatar/b1c162ef2139b7e7c2d2e9b00e4de088?size=50" width="50"></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><img src="https://www.gravatar.com/avatar/b1c162ef2139b7e7c2d2e9b00e4de088?size=50" width="50"> Admin cPanel
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">

      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="uploads/{{Auth::user()->images}}" class="user-image" alt="User Image">
            <span class="hidden-xs">{{Auth::user()->name}}</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="https://www.gravatar.com/avatar/b1c162ef2139b7e7c2d2e9b00e4de088?size=50" class="img-circle" alt="User Image" />

              <p>
                {{Auth::user()->name}}
              </p>
            </li>
            <!-- Menu Body -->
            <!-- Menu Footer-->
            <li class="user-footer">
              
              <div class="text-center">
                <div class="btn-group">
                  <a href="backend/user-profile" class="btn btn-xs btn-info">Hồ sơ</a>
                  <a href="backend/user-change-password" class="btn btn-xs btn-primary">Đổi mật khẩu</a>
                  <a href="{{ route('User.logout') }}" onclick="return confirm('Bạn có chắc chắn thoát ?')" class="btn btn-xs btn-danger">Thoát</a>
                </div>
              </div>
            </li>
          </ul>
        </li>
              </ul>
    </div>
  </nav>
</header>

<header id="header" class="">
		@if (Session::has('info'))
		<section>
		<div class="container-fluid">
			<div class="row">
				<div class="alert alert-info text-center">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>{!! Session::get('info') !!}</strong>
				</div>
			</div>
		</div>
		</section>
		@endif
		<section class="topbar hidden-xs">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<ul class="topbar_left_1">
							<li>
								<i class="fa fa-mobile" aria-hidden="true" style="font-size: 15px;"></i>
								<a href="" title="" class="mobile">{{ getinfo()->phone }}</a>
							</li>
						</ul>
						<ul class="topbar_left_2">
							<li>
								<i class="fa fa-facebook-square" aria-hidden="true"></i>
								<a href="{{ getinfo()->facebook }}" title="" class="facebook">https://www.facebook.com</a>
							</li>
						</ul>
					</div>
					<div class="col-md-6">
						<ul class="topbar_left_2 topbar_right">
							@if (!Auth()->check())
							<li>
								<a href="{{ route('User.getIndex') }}" title="" class="topbar_right_1">Đăng nhập</a>
							</li>
							<li>
								<a href="{{ route('User.getIndex') }}" title="" class="topbar_right_1">Đăng ký</a>
							</li>
							@else
							<li style="text-transform: capitalize;">
								<a href="{{ route('User.getProfile') }}" title="" class="topbar_right_1">{{Auth::user()->name}}</a>
							</li>
							<li>
								<a href="{{ route('User.logout') }}" title="" class="topbar_right_1">Đăng xuất</a>
							</li>
							@endif
						</ul>
					</div>
				</div>
			</div>
		</section>
		<section class="mid-header">
			<div class="container">
				<div class="row mid-header_1">
					<div class="col-md-3">
						<a href="" title="">
							<img src="uploads/{{ getlogo() }}" alt="" class="img-responsive">
						</a>
					</div>
					<div class="col-md-6">
						<div style="margin-top: 10px">
							<form action="{{ route('Search.viewProduct') }}" method="GET" class="input-group search-bar" role="search">
							<input type="text" name="query"  placeholder="Bạn cần tìm gì hôm nay" class="input-group-flie search-input">
							<span class="">
								<button type="submit" class="btn icon-fallback-text my-seach">
									<span class="fa fa-search my-fa-search"></span>      
								</button>   
							</span>
						</form>
						</div>
					</div>
					<div class="col-md-3 hidden-xs">
						<ul class="top-righ giohang" style="margin-left: 20px;margin-top: 10px">
								<li >
									<a href="{{ route('Cart.getIndex') }}" title=""><img src="public/frontend/images/icon_hovercart.png" alt="" class="img-yeu-thich"></a>
									<span class="count_item">{{Cart::count()}}</span>
								</li>
								<li><span>Giỏ hàng</span></li>
							</ul>
					</div>
				</div>
			</div>
		</section>
		<nav class="navbar navbar-default my_navbar" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>


				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						@foreach (getCategory() as $categorie)
						<li class="dropdown">
							<a href="{{ route('Fronted.getCategory',$categorie->slug."-".$categorie->id) }}" 
							@if ($categorie->sub_category->count())
								class="dropdown-toggle" data-toggle="dropdown"
							@endif
								>{{$categorie->name}}
								@if ($categorie->sub_category->count())
									<b class="caret"></b>
								@endif
							</a>
							@if ($categorie->sub_category->count())
								<ul class="dropdown-menu">
									@foreach ($categorie->sub_category as $subCategory)
										<li><a href="{{ route('Fronted.getCategory',$subCategory->slug."-".$subCategory->id) }}">{{$subCategory->name}}</a></li>
									@endforeach
							    </ul>
							@endif
						</li>
						@endforeach
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>
	</header><!-- /header -->
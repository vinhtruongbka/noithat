<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<base href="{{ asset('') }}">
	<title>Nội thất</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="public/frontend/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/frontend/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="public/frontend/css/style.css">
	
</head>
<body>
	<header id="header" class="">
		<section class="topbar hidden-xs">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<ul class="topbar_left_1">
							<li>
								<i class="fa fa-mobile" aria-hidden="true" style="font-size: 15px;"></i>
								<a href="" title="" class="mobile">016599840007</a>
							</li>
						</ul>
						<ul class="topbar_left_2">
							<li>
								<i class="fa fa-facebook-square" aria-hidden="true"></i>
								<a href=" https://www.facebook.com" title="" class="mobile">https://www.facebook.com</a>
							</li>
						</ul>
					</div>
					<div class="col-md-6">
						<ul class="topbar_left_2 topbar_right">
							<li>
								<a href=" https://www.facebook.com" title="" class="topbar_right_1">Đăng nhập</a>
							</li>
							<li>
								<a href=" https://www.facebook.com" title="" class="topbar_right_1">Đăng ký</a>
							</li>
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
							<img src="public/frontend/images/logo.png" alt="" class="img-responsive">
						</a>
					</div>
					<div class="col-md-6">
						<div style="margin-top: 10px">
							<form action="" method="" class="input-group search-bar" role="search">
								<input type="text" name="query" value="" autocomplete="off" placeholder="Bạn đang tìm sản phẩm nào" class="input-group-flie">
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
									<a href="" title=""><img src="public/frontend/images/icon_hovercart.png" alt="" class="img-yeu-thich"></a>
									<span class="count_item">0</span>
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
				<div class="collapse navbar-collapse navbar-ex1-collapse my-navbar-collapse">
					<ul class="nav navbar-nav my_nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Bàn ghế phòng khách <b class="caret"></b></a>
							<ul class="dropdown-menu my-dropdown-menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li><a href="#">Separated link</a></li>
							</ul>
						</li>
						<li ><a href="#">Tủ quần áo</a></li>
						<li ><a href="#">Giá tủ giày</a></li>
						<li ><a href="#">Giường ngủ</a></li>
						<li ><a href="#">Bàn trang điểm</a></li>
						<li ><a href="#">Bàn ăn</a></li>
						<li ><a href="#">Kệ tivi</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>
	</header><!-- /header -->
	<main>
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<div class="item active">
					<img src="public/frontend/images/slider_1.jpg" alt="Los Angeles">
				</div>

				<div class="item">
					<img src="public/frontend/images/slider_2.jpg" alt="Chicago">
				</div>
			</div>

			<!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		<section class="service-1">
			<div class="container">
				<div class="row">
					<div class="col-md-4 service-2">
						<div class="text-center-1">
							<div class="service">
								<img src="public/frontend/images/srv_1.png" alt="">
							</div>
							<div class="service">
								<ul class="service_item_ed">
									<li class="service-title">Miễn phí giao hàng toàn quốc</li>
									<li>Với đơn hàng từ 800.000đ trở lên
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-4 service-2">
						<div class="text-center-1">
							<div class="service">
								<img src="public/frontend/images/srv_2.png" alt="">
							</div>
							<div class="service">
								<ul class="service_item_ed">
									<li class="service-title">Đặt hàng online cực nhanh</li>
									<li>Gọi ngay: 0359984007
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-4 service-2">
						<div class="text-center-1">
							<div class="service">
								<img src="public/frontend/images/srv_3.png" alt="">
							</div>
							<div class="service">
								<ul class="service_item_ed">
									<li class="service-title">Bảo hành 365 ngày</li>
									<li>Cam kết bảo hành 1 năm
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="sanpham">
			<div class="container">
				<div class="row">
					<div class="text-center danhmuc">
						<h3><a href="" title="">TOP SẢN PHẨM BÁN CHẠY NHẤT</a></h3>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="thumbnail my-thumbnail">
							<div class="sale-flash new text-center">Mới</div>
							<a href="#" class="">
							<img data-src="#" alt="" src="public/frontend/images/sanpham_1.jpg" class="img-responsive">
						</a>
						<div class="caption my-caption">
							<h5>Kệ Tivi Gỗ Xoan Đào Mẫu Đẹp</h5>
							<p><span>
								1.100.000₫
							</span>
								<span class="product-price-old">
									1.300.000₫			
								</span>
							</p>
						</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="thumbnail my-thumbnail">
							<div class="sale-flash new text-center">Mới</div>
							<a href="#" class="">
							<img data-src="#" alt="" src="public/frontend/images/sanpham_1.jpg" class="img-responsive">
						</a>
						<div class="caption my-caption">
							<h5>Kệ Tivi Gỗ Xoan Đào Mẫu Đẹp</h5>
							<p><span>
								1.100.000₫
							</span>
								<span class="product-price-old">
									1.300.000₫			
								</span>
							</p>
						</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="thumbnail my-thumbnail">
							<div class="sale-flash new text-center">Mới</div>
							<a href="#" class="">
							<img data-src="#" alt="" src="public/frontend/images/sanpham_1.jpg" class="img-responsive">
						</a>
						<div class="caption my-caption">
							<h5>Kệ Tivi Gỗ Xoan Đào Mẫu Đẹp</h5>
							<p><span>
								1.100.000₫
							</span>
								<span class="product-price-old">
									1.300.000₫			
								</span>
							</p>
						</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="thumbnail my-thumbnail">
							<div class="sale-flash new text-center">Mới</div>
							<a href="#" class="">
							<img data-src="#" alt="" src="public/frontend/images/sanpham_1.jpg" class="img-responsive">
						</a>
						<div class="caption my-caption">
							<h5>Kệ Tivi Gỗ Xoan Đào Mẫu Đẹp</h5>
							<p><span>
								1.100.000₫
							</span>
								<span class="product-price-old">
									1.300.000₫			
								</span>
							</p>
						</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section>
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<img src="public/frontend/images/banner_1.png" alt="" class="img-responsive">
					</div>
					<div class="col-md-6">
						<img src="public/frontend/images/banner_2.png" alt="" class="img-responsive">
					</div>
				</div>
			</div>
		</section>
		<section class="sanpham">
			<div class="container">
				<div class="row">
					<div class="text-center danhmuc">
						<h3><a href="" title="">Bàn ghế phòng khách</a></h3>
					</div>
				</div>
				<div class="row">
					<div class="col-md-15">
						<div class="thumbnail my-thumbnail">
							<div class="sale-flash sale text-center">SALE</div>
							<a href="#" class="">
							<img data-src="#" alt="" src="public/frontend/images/sanpham_1.jpg" class="img-responsive">
						</a>
						<div class="caption my-caption">
							<h5>Kệ Tivi Gỗ Xoan Đào Mẫu Đẹp</h5>
							<p><span>
								1.100.000₫
							</span>
								<span class="product-price-old">
									1.300.000₫			
								</span>
							</p>
						</div>
						</div>
					</div>
					<div class="col-md-15">
						<div class="thumbnail my-thumbnail">
							<div class="sale-flash sale text-center">SALE</div>
							<a href="#" class="">
							<img data-src="#" alt="" src="public/frontend/images/sanpham_1.jpg" class="img-responsive">
						</a>
						<div class="caption my-caption">
							<h5>Kệ Tivi Gỗ Xoan Đào Mẫu Đẹp</h5>
							<p><span>
								1.100.000₫
							</span>
								<span class="product-price-old">
									1.300.000₫			
								</span>
							</p>
						</div>
						</div>
					</div>
					<div class="col-md-15">
						<div class="thumbnail my-thumbnail">
							<div class="sale-flash sale text-center">SALE</div>
							<a href="#" class="">
							<img data-src="#" alt="" src="public/frontend/images/sanpham_1.jpg" class="img-responsive">
						</a>
						<div class="caption my-caption">
							<h5>Kệ Tivi Gỗ Xoan Đào Mẫu Đẹp</h5>
							<p><span>
								1.100.000₫
							</span>
								<span class="product-price-old">
									1.300.000₫			
								</span>
							</p>
						</div>
						</div>
					</div>
					<div class="col-md-15">
						<div class="thumbnail my-thumbnail">
							<div class="sale-flash new text-center">SALE</div>
							<a href="#" class="">
							<img data-src="#" alt="" src="public/frontend/images/sanpham_1.jpg" class="img-responsive">
						</a>
						<div class="caption my-caption">
							<h5>Kệ Tivi Gỗ Xoan Đào Mẫu Đẹp</h5>
							<p><span>
								1.100.000₫
							</span>
								<span class="product-price-old">
									1.300.000₫			
								</span>
							</p>
						</div>
						</div>
					</div>
					<div class="col-md-15">
						<div class="thumbnail my-thumbnail">
							<div class="sale-flash sale text-center">SALE</div>
							<a href="#" class="">
							<img data-src="#" alt="" src="public/frontend/images/sanpham_1.jpg" class="img-responsive">
						</a>
						<div class="caption my-caption">
							<h5>Kệ Tivi Gỗ Xoan Đào Mẫu Đẹp</h5>
							<p><span>
								1.100.000₫
							</span>
								<span class="product-price-old">
									1.300.000₫			
								</span>
							</p>
						</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="sanpham">
			<div class="container">
				<div class="row">
					<div class="text-center danhmuc">
						<h3><a href="" title="">Bàn trang điểm</a></h3>
					</div>
				</div>
				<div class="row">
					<div class="col-md-15">
						<div class="thumbnail my-thumbnail">
							<div class="sale-flash sale text-center">SALE</div>
							<a href="#" class="">
							<img data-src="#" alt="" src="public/frontend/images/sanpham_1.jpg" class="img-responsive">
						</a>
						<div class="caption my-caption">
							<h5>Kệ Tivi Gỗ Xoan Đào Mẫu Đẹp</h5>
							<p><span>
								1.100.000₫
							</span>
								<span class="product-price-old">
									1.300.000₫			
								</span>
							</p>
						</div>
						</div>
					</div>
					<div class="col-md-15">
						<div class="thumbnail my-thumbnail">
							<div class="sale-flash sale text-center">SALE</div>
							<a href="#" class="">
							<img data-src="#" alt="" src="public/frontend/images/sanpham_1.jpg" class="img-responsive">
						</a>
						<div class="caption my-caption">
							<h5>Kệ Tivi Gỗ Xoan Đào Mẫu Đẹp</h5>
							<p><span>
								1.100.000₫
							</span>
								<span class="product-price-old">
									1.300.000₫			
								</span>
							</p>
						</div>
						</div>
					</div>
					<div class="col-md-15">
						<div class="thumbnail my-thumbnail">
							<div class="sale-flash sale text-center">SALE</div>
							<a href="#" class="">
							<img data-src="#" alt="" src="public/frontend/images/sanpham_1.jpg" class="img-responsive">
						</a>
						<div class="caption my-caption">
							<h5>Kệ Tivi Gỗ Xoan Đào Mẫu Đẹp</h5>
							<p><span>
								1.100.000₫
							</span>
								<span class="product-price-old">
									1.300.000₫			
								</span>
							</p>
						</div>
						</div>
					</div>
					<div class="col-md-15">
						<div class="thumbnail my-thumbnail">
							<div class="sale-flash new text-center">SALE</div>
							<a href="#" class="">
							<img data-src="#" alt="" src="public/frontend/images/sanpham_1.jpg" class="img-responsive">
						</a>
						<div class="caption my-caption">
							<h5>Kệ Tivi Gỗ Xoan Đào Mẫu Đẹp</h5>
							<p><span>
								1.100.000₫
							</span>
								<span class="product-price-old">
									1.300.000₫			
								</span>
							</p>
						</div>
						</div>
					</div>
					<div class="col-md-15">
						<div class="thumbnail my-thumbnail">
							<div class="sale-flash sale text-center">SALE</div>
							<a href="#" class="">
							<img data-src="#" alt="" src="public/frontend/images/sanpham_1.jpg" class="img-responsive">
						</a>
						<div class="caption my-caption">
							<h5>Kệ Tivi Gỗ Xoan Đào Mẫu Đẹp</h5>
							<p><span>
								1.100.000₫
							</span>
								<span class="product-price-old">
									1.300.000₫			
								</span>
							</p>
						</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="sanpham">
			<div class="container">
				<div class="row">
					<div class="text-center danhmuc">
						<h3><a href="" title="">Tủ quần áo</a></h3>
					</div>
				</div>
				<div class="row">
					<div class="col-md-15">
						<div class="thumbnail my-thumbnail">
							<div class="sale-flash sale text-center">SALE</div>
							<a href="#" class="">
							<img data-src="#" alt="" src="public/frontend/images/sanpham_1.jpg" class="img-responsive">
						</a>
						<div class="caption my-caption">
							<h5>Kệ Tivi Gỗ Xoan Đào Mẫu Đẹp</h5>
							<p><span>
								1.100.000₫
							</span>
								<span class="product-price-old">
									1.300.000₫			
								</span>
							</p>
						</div>
						</div>
					</div>
					<div class="col-md-15">
						<div class="thumbnail my-thumbnail">
							<div class="sale-flash sale text-center">SALE</div>
							<a href="#" class="">
							<img data-src="#" alt="" src="public/frontend/images/sanpham_1.jpg" class="img-responsive">
						</a>
						<div class="caption my-caption">
							<h5>Kệ Tivi Gỗ Xoan Đào Mẫu Đẹp</h5>
							<p><span>
								1.100.000₫
							</span>
								<span class="product-price-old">
									1.300.000₫			
								</span>
							</p>
						</div>
						</div>
					</div>
					<div class="col-md-15">
						<div class="thumbnail my-thumbnail">
							<div class="sale-flash sale text-center">SALE</div>
							<a href="#" class="">
							<img data-src="#" alt="" src="public/frontend/images/sanpham_1.jpg" class="img-responsive">
						</a>
						<div class="caption my-caption">
							<h5>Kệ Tivi Gỗ Xoan Đào Mẫu Đẹp</h5>
							<p><span>
								1.100.000₫
							</span>
								<span class="product-price-old">
									1.300.000₫			
								</span>
							</p>
						</div>
						</div>
					</div>
					<div class="col-md-15">
						<div class="thumbnail my-thumbnail">
							<div class="sale-flash new text-center">SALE</div>
							<a href="#" class="">
							<img data-src="#" alt="" src="public/frontend/images/sanpham_1.jpg" class="img-responsive">
						</a>
						<div class="caption my-caption">
							<h5>Kệ Tivi Gỗ Xoan Đào Mẫu Đẹp</h5>
							<p><span>
								1.100.000₫
							</span>
								<span class="product-price-old">
									1.300.000₫			
								</span>
							</p>
						</div>
						</div>
					</div>
					<div class="col-md-15">
						<div class="thumbnail my-thumbnail">
							<div class="sale-flash sale text-center">SALE</div>
							<a href="#" class="">
							<img data-src="#" alt="" src="public/frontend/images/sanpham_1.jpg" class="img-responsive">
						</a>
						<div class="caption my-caption">
							<h5>Kệ Tivi Gỗ Xoan Đào Mẫu Đẹp</h5>
							<p><span>
								1.100.000₫
							</span>
								<span class="product-price-old">
									1.300.000₫			
								</span>
							</p>
						</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="sanpham">
			<div class="container">
				<div class="row">
					<div class="text-center danhmuc">
						<h3><a href="" title="">Bàn ăn</a></h3>
					</div>
				</div>
				<div class="row">
					<div class="col-md-15">
						<div class="thumbnail my-thumbnail">
							<div class="sale-flash sale text-center">SALE</div>
							<a href="#" class="">
							<img data-src="#" alt="" src="public/frontend/images/sanpham_1.jpg" class="img-responsive">
						</a>
						<div class="caption my-caption">
							<h5>Kệ Tivi Gỗ Xoan Đào Mẫu Đẹp</h5>
							<p><span>
								1.100.000₫
							</span>
								<span class="product-price-old">
									1.300.000₫			
								</span>
							</p>
						</div>
						</div>
					</div>
					<div class="col-md-15">
						<div class="thumbnail my-thumbnail">
							<div class="sale-flash sale text-center">SALE</div>
							<a href="#" class="">
							<img data-src="#" alt="" src="public/frontend/images/sanpham_1.jpg" class="img-responsive">
						</a>
						<div class="caption my-caption">
							<h5>Kệ Tivi Gỗ Xoan Đào Mẫu Đẹp</h5>
							<p><span>
								1.100.000₫
							</span>
								<span class="product-price-old">
									1.300.000₫			
								</span>
							</p>
						</div>
						</div>
					</div>
					<div class="col-md-15">
						<div class="thumbnail my-thumbnail">
							<div class="sale-flash sale text-center">SALE</div>
							<a href="#" class="">
							<img data-src="#" alt="" src="public/frontend/images/sanpham_1.jpg" class="img-responsive">
						</a>
						<div class="caption my-caption">
							<h5>Kệ Tivi Gỗ Xoan Đào Mẫu Đẹp</h5>
							<p><span>
								1.100.000₫
							</span>
								<span class="product-price-old">
									1.300.000₫			
								</span>
							</p>
						</div>
						</div>
					</div>
					<div class="col-md-15">
						<div class="thumbnail my-thumbnail">
							<div class="sale-flash new text-center">SALE</div>
							<a href="#" class="">
							<img data-src="#" alt="" src="public/frontend/images/sanpham_1.jpg" class="img-responsive">
						</a>
						<div class="caption my-caption">
							<h5>Kệ Tivi Gỗ Xoan Đào Mẫu Đẹp</h5>
							<p><span>
								1.100.000₫
							</span>
								<span class="product-price-old">
									1.300.000₫			
								</span>
							</p>
						</div>
						</div>
					</div>
					<div class="col-md-15">
						<div class="thumbnail my-thumbnail">
							<div class="sale-flash sale text-center">SALE</div>
							<a href="#" class="">
							<img data-src="#" alt="" src="public/frontend/images/sanpham_1.jpg" class="img-responsive">
						</a>
						<div class="caption my-caption">
							<h5>Kệ Tivi Gỗ Xoan Đào Mẫu Đẹp</h5>
							<p><span>
								1.100.000₫
							</span>
								<span class="product-price-old">
									1.300.000₫			
								</span>
							</p>
						</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
	<footer>
		<section class="footer">
			<div class="container">
				<div class="row footer-1">
					<div class="col-md-2">
						<h5>VỀ CHÚNG TÔI</h5>
							<ul class="nav nav-tabs my-nav-tabs">
		                   <li><a href="">Trang chủ</a></li>
		                   <li><a href="">Giới thiệu</a></li>
		                   <li><a href="">Liên hệ</a></li>
		                   <li><a href="">Điều khoản</a></li>
	                   </ul>
					</div>
					<div class="col-md-2">
						<h5>HỖ TRỢ KHÁCH HÀNG</h5>
							<ul class="nav nav-tabs my-nav-tabs">
		                   <li><a href="">Trang chủ</a></li>
		                   <li><a href="">Giới thiệu</a></li>
		                   <li><a href="">Liên hệ</a></li>
		                   <li><a href="">Điều khoản</a></li>
	                   </ul>
					</div>
					<div class="col-md-2">
						<h5>THÔNG TIN CẦN BIẾT</h5>
							<ul class="nav nav-tabs my-nav-tabs">
		                   <li><a href="">Trang chủ</a></li>
		                   <li><a href="">Giới thiệu</a></li>
		                   <li><a href="">Liên hệ</a></li>
		                   <li><a href="">Điều khoản</a></li>
	                   </ul>
					</div>
					<div class="col-md-2">
						<h5>ĐẶT HÀNG 24H</h5>
							<ul class="nav nav-tabs my-nav-tabs">
		                   <li><a href="">Trang chủ</a></li>
		                   <li><a href="">Giới thiệu</a></li>
		                   <li><a href="">Liên hệ</a></li>
		                   <li><a href="">Điều khoản</a></li>
	                   </ul>
					</div>
					<div class="col-md-4">
						<h5>VỀ CHÚNG TÔI</h5>
							<img src="public/frontend/images/facebook.png" alt="">
					</div>
				</div>
			</div>
		</section>
		<section class="footer-2">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<p class="banquyen">© Bản quyền thuộc về VinhTruong | Cung cấp bởi Thefox</p>
					</div>
					<div class="col-md-6">
						<ul class="nav nav-tabs my-nav-tabs my-nav-tabs-2">
		                   <li><a href="">Trang chủ</a></li>
		                   <li><a href="">Giới thiệu</a></li>
		                   <li><a href="">Liên hệ</a></li>
		                   <li><a href="">Điều khoản</a></li>
	                   </ul>
					</div>
				</div>
			</div>
		</section>	
	</footer>
</body>
<script src="public/frontend/js/jquery-3.2.1.min.js"></script>
<script src="public/frontend/bootstrap/js/bootstrap.min.js"></script>
</html>
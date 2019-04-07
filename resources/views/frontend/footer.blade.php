<style type="text/css">
	.list-menu .li_menu.li_menu_xxx:before {
    content: "";
    background-image: url("public/frontend/images/phone_footer.png");
    background-repeat: no-repeat;
    width: 48px;
    height: 48px;
    position: absolute;
    left: -65px;
    top: 15px
}
</style>
<section class="footer">
	<div class="container">
		<div class="row footer-1">
			<div class="col-md-3">
				<h5>VỀ CHÚNG TÔI</h5>
				<ul class="nav nav-divider my-nav-tabs">
					<li><a href="">Trang chủ</a></li>
					<li><a href="">Giới thiệu</a></li>
					<li><a href="">Liên hệ</a></li>
					<li><a href="">Điều khoản</a></li>
				</ul>
			</div>
			<div class="col-md-3">
				<h5>DANH MỤC CHÍNH</h5>
				<ul class="nav nav-divider my-nav-tabs">
					@foreach (getCategoryFot() as $cats)
						<li><a href="">{{$cats->name}}</a></li>
					@endforeach
				</ul>
			</div>
			<div class="col-md-3">
				<h5>DANH MỤC CON</h5>
				<ul class="nav nav-divider my-nav-tabs">
					@foreach (getCatte() as $cat)
						<li><a href="">{{$cat->name}}</a></li>
					@endforeach
				</ul>
			</div>
			<div class="col-md-3 hidden-xs">
				<h5>ĐẶT HÀNG 24H</h5>
				<ul class="list-menu">
					<li class="li_menu li_menu_xxx">
						<span class="timexx">Đặt hàng nhanh:</span>
						<a class="rc yeloww" href="tel:{{ getinfo()->phone }}" style="color: #fdbb0a">{{ getinfo()->phone }}</a>
					</li>
				</ul>
				<p style="color: #a8a8a9">Phục vụ tất cả các ngày trong tuần</p>
				<p style="color: #a8a8a9">(8h00 am - 22h00 pm)</p>
			</div>
		</div>
	</div>
</section>
<section class="footer-2">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<p class="banquyen">© {{ getinfo()->adress }}</p>
			</div>
			<div class="col-md-6">
				<ul class="nav nav-tabs my-nav-tabs my-nav-tabs-2" style="margin-top: 0px">
					<li>
						<a href="{{ getinfo()->facebook }}" title="Facebook" class=""><img src="public/frontend/images/face.png" class="social-icons" alt="Facebook" title="Facebook"></a>
					</li>
					<li><a href="">Trang chủ</a></li>
					<li><a href="">Giới thiệu</a></li>
					<li><a href="">Liên hệ</a></li>
					<li><a href="">Điều khoản</a></li>
				</ul>
			</div>
		</div>
	</div>
</section>
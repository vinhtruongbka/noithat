@extends('frontend.masster')
@section('contentFront')
<section class="my-breadcrumb">
	<div class="container">
		<div class="row">
			<ul class="breadcrumb my-breadcrumb-1">
				<li><a href="#">Trang Chủ</a></li>
				<li><a href="{{ route('Fronted.getCategory',$category->slug."-".$category->id) }}">{{$category->name}}</a></li>
				<li class="active">{{$product->name}}</li>
			</ul>
		</div>
	</div>
</section>
<section class="chitiet">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-6">
						<a href="#" class="thumbnail">
							<img data-src="#" alt="" src="uploads/{{$product->image}}"  id="zoom_01">
						</a>
					</div>
					<div class="col-md-6">
						<div>
							<h3 class="title-detai">
								{{$product->name}}
							</h3>
							<div>
								<span>Chất liệu: 
									<span class="thuonghieu">Gỗ xoan đào</span>
								</span>
								<span>&nbsp;|&nbsp;Tình trạng: 
									<span class="thuonghieu">Còn hàng</span>
								</span>
							</div>
							<div class="star">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
							</div>
							<div class="my-caption my-caption-detail">
								<p><span class="gia-detail">
									{{number_format($product->price_input)}}₫
								</span>
								<span class="product-price-old">
									{{number_format($product->price_ouput)}}₫		
								</span>
							</p>
						</div>
						<div class="mota-detai">
							<p>
								{!!$product->desc!!} 
							</p>
						</div>

						<div class="kich-thuoc-5">
							<div class="muahang">
								<form action="{{ route('Cart.postPurchase') }}" method="POST" role="form">
									<input type="hidden" name="_token" value="{{csrf_token()}}">
									<input type="hidden" name="id" value="{{$product->id}}">
									<button type="submit" class="btn btn-default">
										<span class="glyphicon glyphicon-shopping-cart"></span>
										CHO VÀO GIỎ HÀNG
									</button>
								</form>
							</div>
							<div class="kich-thuoc-mobile">
								<p>
									Hoặc đặt mua:
									<span>01659984007</span>
									<span>( Miễn phí cuộc gọi )</span>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row my-nav-tabs">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#home" data-toggle="tab">Chi tiết</a></li>
					<li><a href="#info" data-toggle="tab">Hướng dẫn mua hàng</a></li>
				</ul>

				<div class="tab-content my-tab-content">
					<div class="tab-pane active" id="home">
						<h4 style="text-transform: capitalize;">{{$product->name}}</h4>
						{!!$product->content!!} 
					</div>
					<div class="tab-pane" id="info">Chưa có thông tin</div>
				</div>
			</div>

			<div class="row">
			<div class="text-center danhmuc">
				<h3><a href="" title="">SẢN PHẨM LIÊN QUAN</a></h3>
			</div>
		</div>
		<div class="row">
			@foreach ($reProducts as $reProduct)
				<div class="col-md-4">
					<div class="thumbnail my-thumbnail">
						@if ( $reProduct->status == 0)
							<div class="sale-flash new text-center">Hot</div>
						@endif
						@if ( $reProduct->price_ouput > $reProduct->price_input || $reProduct->price_ouput == null)
							<div class="sale-flash sale text-center">Sale</div>
						@endif
						<a href="{{ route('Fronted.getProduct',[$product->slug,$reProduct->slug.'-'.$reProduct->id]) }}" class="">
							<img data-src="#" alt="" src="uploads/{{$reProduct->image}}" class="img-responsive">
						</a>
						<div class="caption my-caption">
							<a href="{{ route('Fronted.getProduct',[$product->slug,$reProduct->slug.'-'.$reProduct->id]) }}">
								<h5 style="text-transform: capitalize;height: 36px;overflow: hidden;">{{$reProduct->name}}
								</h5>
							</a>
							<p><span>
								{{number_format($reProduct->price_input)}} ₫
							</span>
							<span class="product-price-old">
								{{number_format($reProduct->price_ouput)}}₫			
							</span>
						</p>
					</div>
				</div>
			</div>
			@endforeach	
		</div>
		</div>
		<div class="col-md-3">
			<div>
				<div class="danhmuc_list">
					<h3 >Có thể bạn quan tâm</h3>
				</div>
				@foreach ($interest as $interes)
					<div style="padding-top: 10px">
					<div class="img-sibar-detai">
					<img src="public/frontend/images/sanpham_1.jpg" alt="" class="img-responsive">
						</div>
						<div class="danhmuc_list_1">
							<div class="my-caption my-caption-detail-1">
								<h5>Monrow Women Black Heels</h5>
								<div class="star">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
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
				@endforeach
		</div>
	</div>
</div>
</div>
</section>
@endsection
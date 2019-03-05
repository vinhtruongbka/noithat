@extends('frontend.masster')
@section('contentFront')
	@include('frontend.slide')
@include('frontend.service')
<section class="sanpham">
	<div class="container">
		<div class="row">
			<div class="text-center danhmuc">
				<h3><a href="" title="">TOP SẢN PHẨM BÁN CHẠY NHẤT</a></h3>
			</div>
		</div>
		<div class="row">
			@foreach ($hots as $hot)
				<div class="col-md-3">
					<div class="thumbnail my-thumbnail">
						@if ( $hot->status == 0)
							<div class="sale-flash new text-center">Hot</div>
						@endif
						@if ( $hot->price_ouput > $hot->price_input || $hot->price_ouput == null)
							<div class="sale-flash sale text-center">Sale</div>
						@endif
						<a href="#" class="">
							<img data-src="#" alt="" src="uploads/{{$hot->image}}" class="img-responsive">
						</a>
						<div class="caption my-caption">
							<h5 style="text-transform: capitalize;height: 36px;overflow: hidden;">{{$hot->name}}
							</h5>
							<p><span>
								{{number_format($hot->price_input)}} ₫
							</span>
							<span class="product-price-old">
								{{number_format($hot->price_ouput)}}₫			
							</span>
						</p>
					</div>
				</div>
			</div>
			@endforeach
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
@foreach ($products as $product)
	@if ($product->product->count())
		<section class="sanpham">
	<div class="container">
		<div class="row">
			<div class="text-center danhmuc">
				<h3><a href="" title="">{{$product->name}}</a></h3>
			</div>
		</div>
		<div class="row">
			@foreach ($product->product as $produc)
				<div class="col-md-15">
					<div class="thumbnail my-thumbnail">
						@if ( $produc->status == 0)
							<div class="sale-flash new text-center">Hot</div>
						@endif
						@if ( $produc->price_ouput > $produc->price_input || $produc->price_ouput == null)
							<div class="sale-flash sale text-center">Sale</div>
						@endif
						<a href="#" class="">
							<img data-src="#" alt="" src="uploads/{{$produc->image}}" class="img-responsive">
						</a>
						<div class="caption my-caption">
							<h5 style="text-transform: capitalize;height: 36px;overflow: hidden;">{{$produc->name}}
							</h5>
							<p><span>
								{{number_format($produc->price_input)}} ₫
							</span>
							<span class="product-price-old">
								{{number_format($produc->price_ouput)}}₫			
							</span>
						</p>
					</div>
				</div>
			</div>
			@endforeach
 			</div>
		</div>
</section>
	@endif
@endforeach
@endsection
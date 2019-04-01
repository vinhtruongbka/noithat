@extends('frontend.masster')
@section('contentFront')
<section class="my-breadcrumb">
	<div class="container">
		<div class="row">
			<ul class="breadcrumb my-breadcrumb-1">
				<li><a href="#">Trang Chủ</a></li>
				<li class="active">Kết quả tìm kiếm</li>
			</ul>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row title-head_1">
					<div class="title-head">
						<h4 style="text-transform: capitalize;">Sản phẩm tìm kiếm</h4>
					</div>
					<div class="title-head">
						<p>
							(Hiển thị {{$products->firstItem()}} - {{$products->lastItem()}}/{{$products->total()}} sản phẩm)
						</p>
					</div>
				</div>
				<div class="row sanpham_list">
					@foreach ($products as $product)
				<div class="col-md-3">
					<a href="{{ route('Fronted.getProduct',[$product->catSlug,$product->slug.'-'.$product->id]) }}">
						<div class="thumbnail my-thumbnail">
						@if ( $product->hot == 1)
							<div class="sale-flash new text-center">Hot</div>
						@endif
						@if ( $product->price_ouput > $product->price_input || $product->price_ouput == null)
							<div class="sale-flash sale text-center">Sale</div>
						@endif
						<img data-src="#" alt="" src="uploads/{{$product->image}}" class="img-responsive">
						<div class="caption my-caption">
							<h5 style="text-transform: capitalize;height: 36px;overflow: hidden;">{{$product->name}}
							</h5>
							<p><span>
								{{number_format($product->price_input)}} ₫
							</span>
							<span class="product-price-old">
								{{number_format($product->price_ouput)}}₫			
							</span>
						</p>
					</div>
				</div>
					</a>
			</div>
			@endforeach
				</div>
			<div class="row text-center">
				{!!$products->links()!!}
			</div>
		</div>
	</div>

</div>
</section>
@endsection
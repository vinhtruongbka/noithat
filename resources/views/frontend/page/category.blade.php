@extends('frontend.masster')
@section('contentFront')
<section class="my-breadcrumb">
	<div class="container">
		<div class="row">
			<ul class="breadcrumb my-breadcrumb-1">
				<li><a href="#">Trang Chủ</a></li>
				<li class="active">@if (isset($category->name))
					{{$category->name}}
				@else
					sản phẩm bán chạy
				@endif</li>
			</ul>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div >
					<div class="danhmuc_list" style="margin-top: 20px">
						<h3 >Danh mục sản phẩm</h3>
					</div>
					<div class="danhmuc_list_1">
						<ul>
							@foreach ($catAll as $cat)
								<li>
									<a href="{{ route('Fronted.getCategory',$cat->slug."-".$cat->id) }}">{{$cat->name}}</a>
									<span class="count_x">({{$cat->count}})</span>
								</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-9">
				<div class="row title-head_1">
					<div class="title-head">
						<h4 style="text-transform: capitalize;">@if (isset($category->name))
							{{$category->name}}
						@else
							Top sản phẩm bán chạy nhất
						@endif</h4>
					</div>
					<div class="title-head">
						<p>
							(Hiển thị {{$products->firstItem()}} - {{$products->lastItem()}}/{{$products->total()}} sản phẩm)
						</p>
					</div>
				</div>
				<div class="row sanpham_list">
					@foreach ($products as $produc)
				<div class="col-md-4">
					<div class="thumbnail my-thumbnail">
						@if ( $produc->hot == 1)
							<div class="sale-flash new text-center">Hot</div>
						@endif
						@if ( $produc->price_ouput > $produc->price_input || $produc->price_ouput == null)
							<div class="sale-flash sale text-center">Sale</div>
						@endif
						<a href="{{ route('Fronted.getProduct',$produc->slug.'-'.$produc->id) }}" class="">
							<img data-src="#" alt="" src="uploads/{{$produc->image}}" class="img-responsive">
						</a>
						<div class="caption my-caption">
							<a href="{{ route('Fronted.getProduct',$produc->slug.'-'.$produc->id) }}">
								<h5 style="text-transform: capitalize;height: 36px;overflow: hidden;">{{$produc->name}}
								</h5>
							</a>
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
			<div class="row text-center">
				{!!$products->links()!!}
			</div>
		</div>
	</div>

</div>
</section>
@endsection
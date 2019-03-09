@extends('frontend.masster')
@section('contentFront')
<section class="my-breadcrumb">
	<div class="container">
		<div class="row">
			<ul class="breadcrumb my-breadcrumb-1">
				<li><a href="#">Trang Chủ</a></li>
				<li class="active">Giỏ hàng</li>
			</ul>
		</div>
	</div>
</section>

@if (count($carts) == 0)
	<section>
	<div class="container">
		<div class="row">
			<div class="alert alert-info">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Bạn chưa đặt hàng !</strong>
				<strong><a href="" style="color: red">Mua hàng</a></strong>
			</div>
		</div>
	</div>
    </section>
@else
	<section>
	<div class="container">
		<div class="row">
			<h4>Giỏ hàng của bạn có <span style="color: red">{{Cart::count()}}</span> sản phẩm</h4>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="text-center">Ảnh sản phẩm</th>
						<th class="text-center">Tên sản phẩm sản phẩm</th>
						<th class="text-center">Giá</th>
						<th class="text-center">Số lượng</th>
						<th class="text-center">Thành tiền</th>
						<th class="text-center">Xóa</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($carts as $cart)
						<tr>
							<td>
								<div class="muahang-anh">
									<img src="uploads/{{$cart->options->image}}" alt="" class="img-responsive">
								</div>
							</td>
							<td>
								<p class="muahang_tex"><a href="" style="color: #428bca"></a></p>
								<p class="muahang_tex_1">{{$cart->name}}</p>
							</td>
							<td class="text-center">
								<p class="muahang_tex muahang_tex_2">{{number_format($cart->price)}} VND</p>
							</td>
							<td class="text-center">
								<p class="muahang_tex muahang_tex_1">
									{{$cart->qty}}
								</p>
							</td>
							<td class="text-center">
								<p class="muahang_tex muahang_tex_2">{{number_format($cart->price*$cart->qty)}} VND</p>
							</td>
							<td class="text-center">
								<a href="{{ route('Cart.removeCart',$cart->rowId) }}" onclick="return confirm('Bạn muốn xóa sản phẩm này không')"><i class="fa fa-close muahang_tex"></i></a>
							</td>
						</tr>
					@endforeach		
				</tbody>
			</table>
			<div class="row">
				<div class="col-md-6" style="margin-bottom: 10px;">
					<span class="" style="font-size: 18px;">Tổng tiền thanh toán:</span>
					<span class="" style="color: red;font-size: 18px;">{{Cart::subtotal(0,"",",")}} VND</span>
				</div>
				<div class="col-md-6" style="margin-bottom: 10px;">
					<a href="{{ route('Cart.getPay') }}">
					<button type="button" class="btn btn-default thuchienthanhtoan thanhtoan_muahang" data-dismiss="modal" >Thực hiện thanh toán</button>
					</a>
					<a href="">
						<button type="button" class="btn btn-default tieptucmuahang thanhtoan_muahang" data-dismiss="modal" >Tiếp tục mua hàng</button>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
@endif

@endsection
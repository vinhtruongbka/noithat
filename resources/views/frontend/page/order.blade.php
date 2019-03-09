@extends('frontend.masster')
@section('contentFront')
<section class="my-breadcrumb">
	<div class="container">
		<div class="row">
			<ul class="breadcrumb my-breadcrumb-1">
				<li><a href="#">Trang Chủ</a></li>
				<li class="active">Thanh toán</li>
			</ul>
		</div>
	</div>
</section>
@if (count(Cart::content()) == 0)
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
<section class="chitiet">
	<div class="container">
		<div class="row">
			<form action="{{ route('Cart.postPay') }}" method="POST" role="form">
				<div class="col-md-6">
					<legend>Thông tin giao hàng</legend>
					<div class="form-group">
						<label for="">Họ tên</label>
						<input type="text" class="form-control" id="" value="{{Auth::user()->name}}" name="name">
						@if ($errors->has('name'))
						<div class="help-block" style="color: red">
							{!!$errors->first('name')!!}
						</div>
						@endif
					</div>

					<div class="form-group">
						<label for="">Email</label>
						<input type="text" class="form-control" id="" value="{{Auth::user()->email}}" name="email" disabled="true">
						@if ($errors->has('email'))
						<div class="help-block" style="color: red">
							{!!$errors->first('email')!!}
						</div>
						@endif
					</div>
					<div class="form-group">
						<label for="">Điện thoại</label>
						<input type="text" class="form-control" id="" value="{{Auth::user()->phone}}" name="phone">
						@if ($errors->has('phone'))
						<div class="help-block" style="color: red">
							{!!$errors->first('phone')!!}
						</div>
						@endif
					</div>
					<div class="form-group">
						<label for="">Địa chỉ</label>
						<textarea class="form-control" name="adress" style="height: 100px">{{Auth::user()->adress}}</textarea>
						@if ($errors->has('adress'))
						<div class="help-block" style="color: red">
							{!!$errors->first('adress')!!}
						</div>
						@endif
					</div>
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<button type="submit" class="btn btn-primary">Đặt hàng</button>
				</div>
				<div class="col-md-6">
					<legend>Đơn hàng của bạn</legend>
					<table class="table" >

						<tbody>
							@foreach (Cart::content() as $cart)
							<tr>
								<td style="width: 120px;height: 120px;border-top: none"><img src="uploads/{{$cart->options->image}}" alt="" class="img-responsive" ></td>
								<td style="border-top: none;">
									<p style="font-weight: bold;text-transform: capitalize;">{{$cart->name}}
									</p>
									<p>Đơn giá : 
										{{number_format($cart->price)}} VND
									</p>
									<p>Số lượng : <span style="color: red">{{$cart->qty}}</span></p>
									<span>Xóa:  <a href="{{ route('Cart.removeCart',$cart->rowId) }}" onclick="return confirm('Bạn muốn xóa sản phẩm này không')"><i class="fa fa-close"></i></a></span>
								</td>
							</tr>
							@endforeach
							<tr>
								<td  style="font-weight: bold;font-size: 18px">Tổng tiền</td>
								<td style="color: red">{{Cart::subtotal(0,"",",")}} VND</td>
							</tr>

						</tbody>
					</table>
				</div>
			</form>
		</div>
	</div>
	</section
	@endif
	@endsection
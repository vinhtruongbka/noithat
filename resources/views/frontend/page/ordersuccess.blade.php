@extends('frontend.masster')
@section('contentFront')
<section class="my-breadcrumb">
	<div class="container">
		<div class="row">
			<ul class="breadcrumb my-breadcrumb-1">
				<li><a href="#">Trang Chủ</a></li>
				<li class="active">Thông tin đặt hàng</li>
			</ul>
		</div>
	</div>
</section>
@if (Auth::check())
<section class="">
	<div class="container">
		<div class="row">
			<h4>Thông tin người mua hàng</h4>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="text-center">Tên người mua hàng</th>
						<th class="text-center">Địa chỉ nhận hàng</th>
						<th class="text-center">Số điện thoại</th>
						<th class="text-center">Email</th>
						<th class="text-center">Phương thức thanh toán</th>
						
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="text-center">
							<p class="muahang_tex" style="padding-top: 10px;text-transform: capitalize;">{{$oders->name}}</p>
						</td>
						<td class="text-center">
							<p class="muahang_tex" style="padding-top: 10px;text-transform: capitalize;">{{$oders->address}}</p>
						</td>
						<td class="text-center">
							<p class="muahang_tex" style="padding-top: 10px;text-transform: capitalize;">{{$oders->phone}}</p>
						</td>
						<td class="text-center">
							<p class="muahang_tex" style="padding-top: 10px;text-transform: capitalize;">{{$oders->email}}</p>
						</td>
						<td class="text-center">
							<p class="muahang_tex" style="padding-top: 10px;text-transform: capitalize;">Thanh toán khi nhận hàng</p>
						</td>
					</tr>		
				</tbody>
			</table>
			<h4>Thông tin chi tiết đơn hàng của bạn</h4>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="text-center">Ảnh sản phẩm</th>
						<th class="text-center">Tên sản phẩm sản phẩm</th>
						<th class="text-center">Số lượng</th>
						<th class="text-center">Thành tiền</th>
						<th class="text-center">Trạng thái</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($orderDetails as $orderDetail)
					<tr>
						<td>
							<div class="muahang-anh">
								<img src="uploads/{{$orderDetail->image}}" alt="" class="img-responsive">
							</div>
						</td>
						<td class="">
							<p class="muahang_tex"><a href="" style="color: #428bca"></a></p>
							<p class="muahang_tex_1">{{$orderDetail->name}}</p>
						</td>
						<td class="text-center">
							<p class="muahang_tex muahang_tex_1">{{$orderDetail->quantity}}</p>
						</td>
						<td class="text-center">
							<p class="muahang_tex muahang_tex_2">{{number_format($orderDetail->price)}} VND</p>
						</td>
						<td class="text-center">
							<p class="muahang_tex">
								@if ($orderDetail->status == 0)
									Chưa duyệt
								@elseif($orderDetail->status == 1)
									Đã duyệt,đang giao hàng
								@else
								Đã giao hàng
								@endif
							</p>
						</td>
					</tr>
					@endforeach		
				</tbody>
			</table>
			<a href="">
						<button type="button" class="btn btn-success" style="float: right;">Tiếp tục mua hàng</button>
					</a>
		</div>
	</div>
	</section
	@else
	<div class="container">
		<div class="row">
			<h4>Bạn cần đăng nhập để xem thông tin</h4>
		</div>
	</div>
	@endif
	@endsection
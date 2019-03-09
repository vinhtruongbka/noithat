<?php 
	Route::get('/gio-hang',[
			"uses"=>"cart\CartController@getIndex",
			'as'=>'Cart.getIndex'
		]);

	Route::post('/gio-hang/post-purchase',[
			"uses"=>"cart\CartController@postPurchase",
			'as'=>'Cart.postPurchase'
		]);

	Route::get('gio-hang/remove-cart/{slug}',[
			"uses"=>"cart\CartController@removeCart",
			'as'=>'Cart.removeCart'
		]);

	Route::get('dat-hang',[
			"uses"=>"cart\CartController@getPay",
			'as'=>'Cart.getPay'
		]);

	Route::post('post-pay',[
			"uses"=>"cart\CartController@postPay",
			'as'=>'Cart.postPay'
		]);

	Route::get('don-hang',[
			"uses"=>"cart\CartController@getOrderSuccess",
			'as'=>'Cart.getOrderSuccess'
		]);
 ?>
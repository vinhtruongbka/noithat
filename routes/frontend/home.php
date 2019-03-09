<?php 
	Route::get('/',[
			"uses"=>"frontend\HomeController@getIndex",
			'as'=>'Fronted.getIndex'
		]);

	Route::get('/danh-muc/{slug}',[
			"uses"=>"frontend\HomeController@getCategory",
			'as'=>'Fronted.getCategory'
		]);

	Route::get('/danh-muc/top-san-pham-ban-chay/a39',[
			"uses"=>"frontend\HomeController@getSell",
			'as'=>'Fronted.getSell'
		]);

	Route::get('danh-muc/{cat}/{slug}',[
			"uses"=>"frontend\HomeController@getProduct",
			'as'=>'Fronted.getProduct'
		]);

 ?>
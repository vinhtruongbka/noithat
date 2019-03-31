<?php 
	Route::group(['prefix' => 'backend'], function() {
		Route::get('/order',[
			'uses' => 'backend\OrderController@index',
			'as' => 'backend.order'
		]);

		Route::get('/order-detail/{id}',[
			'uses' => 'backend\OrderController@detail',
			'as' => 'backend.order-detail'
		]);

		Route::get('/order-status/{id}/{status}',[
			'uses' => 'backend\OrderController@update',
			'as' => 'backend.order-status'
		]);
	});
 ?>
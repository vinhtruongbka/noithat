<?php 
	Route::group(['prefix' => 'backend'], function() {
	    Route::get('/product',[
		'uses'=>'backend\ProductController@getProduct',
		'as'=>'backend.getProduct',
		]);

		Route::get('/product-add',[
			'uses' => 'backend\ProductController@add',
			'as' => 'backend.product-add'
		]);

		Route::post('/product-add',[
			'uses' => 'backend\ProductController@postAdd',
			'as' => 'backend.product-add'
		]);

		Route::get('/product-edit/{id}',[
		'uses' => 'backend\ProductController@edit',
		'as' => 'backend.product-edit'
		]);
		Route::get('/product-delete/{id}',[
			'uses' => 'backend\ProductController@delete',
			'as' => 'backend.product-delete'
		]);

		Route::post('/product-edit/{id}',[
			'uses' => 'backend\ProductController@postEdit',
			'as' => 'backend.product-update'
		]);

		Route::post('/product-delete-all',[
			'uses' => 'backend\ProductController@deleteall',
			'as' => 'backend.product-delete-all'
		]);

		Route::get('/product-hidden/{id}',[
			'uses' => 'backend\ProductController@productHidden',
			'as' => 'backend.productHidden'
		]);

		Route::get('/product-show/{id}',[
			'uses' => 'backend\ProductController@productShow',
			'as' => 'backend.productShow'
		]);

		Route::get('/product-hot-hidden/{id}',[
			'uses' => 'backend\ProductController@producthotHidden',
			'as' => 'backend.producthotHidden'
		]);

		Route::get('/product-hot-show/{id}',[
			'uses' => 'backend\ProductController@producthotShow',
			'as' => 'backend.producthotShow'
		]);
	})

 ?>
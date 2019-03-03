<?php 
	Route::get('/backend/product',[
		'uses'=>'ProductController@getProduct',
		'as'=>'getProduct',
	]);
	// Route::get('/backend/post-add',[
	// 	'uses' => 'PostController@add',
	// 	'as' => 'backend.post-add'
	// ]);
	Route::get('/backend/product-category',[
		'uses' => 'ProductController@productCategory',
		'as' => 'backend.productCategory'
	]);

	Route::get('/backend/product-order',[
		'uses' => 'ProductController@productOrder',
		'as' => 'backend.productOrder'
	]);
 ?>
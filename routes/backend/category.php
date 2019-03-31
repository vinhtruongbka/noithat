<?php 

Route::group(['prefix' => 'backend'], function() {
    Route::get('/product-category',[
		'uses' => 'backend\CategoryController@index',
		'as' => 'backend.product-category'
	]);
	Route::get('/product-category-add',[
		'uses' => 'backend\CategoryController@add',
		'as' => 'backend.product-category-add'
	]);
	Route::post('/product-category-add',[
		'uses' => 'backend\CategoryController@postAdd',
		'as' => 'backend.product-category-add'
	]);
	Route::get('/product-category-edit/{id}',[
		'uses' => 'backend\CategoryController@edit',
		'as' => 'backend.product-category-edit'
	]);

	Route::post('/product-category-edit/{id}',[
		'uses' => 'backend\CategoryController@postEdit',
		'as' => 'backend.category-edit'
	]);

	Route::post('/product-category-delete-all',[
		'uses' => 'backend\CategoryController@deleteall',
		'as' => 'backend.category-delete-all'
	]);
	Route::get('/product-category-delete/{id}',[
		'uses' => 'backend\CategoryController@postDelete',
		'as' => 'backend.category-delete'
	]);

	Route::post('category-delete-all',[
		'uses' => 'backend\CategoryController@postDeleteAll',
		'as' => 'backend.category-delete-all'
	]);
});
 ?>
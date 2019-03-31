<?php 
	Route::get('/backend/post',[
		'uses'=>'backend\PostController@getPost',
		'as'=>'getPost',
	]);
	Route::get('/backend/post-add',[
		'uses' => 'backend\PostController@add',
		'as' => 'backend.post-add'
	]);
	Route::get('/backend/category',[
		'uses' => 'backend\PostController@category',
		'as' => 'backend.category'
	]);
 ?>
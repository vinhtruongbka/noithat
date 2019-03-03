<?php 
	Route::get('/backend/post',[
		'uses'=>'PostController@getPost',
		'as'=>'getPost',
	]);
	Route::get('/backend/post-add',[
		'uses' => 'PostController@add',
		'as' => 'backend.post-add'
	]);
	Route::get('/backend/category',[
		'uses' => 'PostController@category',
		'as' => 'backend.category'
	]);
 ?>
<?php 
//Home
	Route::get('/backend',[
		'uses' => 'backend\ProductController@home',
		'as' => 'backend.home.index'
	]);

 ?>
<?php 
	Route::get('/search/product',[
		"uses"=>"search\SearchController@searchProduct",
		'as'=>'Search.searchProduct'
	]);

	Route::get('/search',[
		"uses"=>"search\SearchController@viewProduct",
		'as'=>'Search.viewProduct'
	]);

 ?>
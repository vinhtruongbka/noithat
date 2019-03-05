<?php 
	Route::get('/',[
			"uses"=>"frontend\HomeController@getIndex",
			'as'=>'Fronted.getIndex'
		]);

 ?>
<?php 
	Route::group(['prefix' => 'backend'], function() {
	    Route::get('media',[
		'uses' => 'backend\MediaController@index',
		'as' => 'backend.media'
	    ]);
	    //Banner
	    Route::get('banner',[
		'uses' => 'backend\MediaController@banner',
		'as' => 'backend.banner'
		]);
		Route::post('/banner-edit',[
		'uses' => 'backend\MediaController@bannerpostEdit',
		'as' => 'backend.banner-add-edit-post'
		]);
		Route::get('/banner-edit/{id}',[
		'uses' => 'backend\MediaController@bannerEdit',
		'as' => 'backend.banner-add-edit'
		]);
		Route::get('/banner-add',[
		'uses' => 'backend\MediaController@bannerAdd',
		'as' => 'backend.banner-add'
		]);
		Route::get('/banner-delete/{id}',[
			'uses' => 'backend\MediaController@bannerDelete',
			'as' => 'backend.banner-delete'
		]);
		Route::post('/banner-post-add',[
		'uses' => 'backend\MediaController@bannerpostAdd',
		'as' => 'backend.banner-add-post'
		]);
		//Logo
		Route::get('logo',[
		'uses' => 'backend\MediaController@logo',
		'as' => 'backend.logo'
		]);
		Route::post('/logo-edit',[
		'uses' => 'backend\MediaController@logopostEdit',
		'as' => 'backend.logo-add-edit-post'
		]);
	});


?>
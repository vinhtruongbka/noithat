<?php 
	Route::group(['prefix' => 'backend'], function() {
	    Route::get('/user-profile',[
		'uses' => 'backend\UserController@profile',
		'as' => 'backend.user-profile'
	]);
	Route::post('/user-profile',[
		'uses' => 'backend\UserController@postProfile',
		'as' => 'backend.user-profile'
	]);
	Route::get('/user-change-password',[
		'uses' => 'backend\UserController@changePassword',
		'as' => 'backend.user-change-password'
	]);
	Route::post('/user-change-password',[
		'uses' => 'backend\UserController@postChangePassword',
		'as' => 'backend.postChangePassword'
	]);
	Route::get('login',[
			"uses"=>"backend\AuthController@login",
			'as'=>'login'
		]);
	Route::post('/post-login',[
			"uses"=>"backend\AuthController@postLogin",
			'as'=>'backend.postLogin'
		]);
	Route::get('forget-password',[
			"uses"=>"backend\AuthController@forget",
			'as'=>'backend.forget'
		]);
	Route::post('post-forget-password',[
			"uses"=>"backend\AuthController@postForgetPassword",
			'as'=>'backend.postForgetPassword'
		]);

	Route::get('auth/get-password/{token?}',[
		'uses' => 'backend\AuthController@getPasswordToken',
		'as' => 'backend.getPasswordToken'
	]);

	Route::post('auth/post-password',[
	'uses' => 'backend\AuthController@postPasswordToken',
	'as' => 'backend.postPasswordToken'
		]);
	});

 ?>
<?php 
	Route::get('/tai-khoan',[
			"uses"=>"user\UserController@getIndex",
			'as'=>'User.getIndex'
		]);

	Route::post('/post-login',[
			"uses"=>"user\UserController@postLogin",
			'as'=>'User.postLogin'
		]);

	Route::post('/post-register',[
			"uses"=>"user\UserController@postRegister",
			'as'=>'User.postRegister'
		]);

	Route::get('/logout',[
			"uses"=>"user\UserController@logout",
			'as'=>'User.logout'
		]);


	Route::get('thong-tin-ca-nhan',[
			"uses"=>"user\UserController@getProfile",
			'as'=>'User.getProfile'
		]);

	Route::post('/update-Profile',[
			"uses"=>"user\UserController@updateProfile",
			'as'=>'User.postProfile'
		]);

	Route::post('/update-Password',[
			"uses"=>"user\UserController@updatePassword",
			'as'=>'User.updatePassword'
		]);

	Route::get('quen-mat-khau',[
			"uses"=>"user\UserController@forgetPassword",
			'as'=>'User.forgetPassword'
		]);

	Route::post('post-forget-password',[
			"uses"=>"user\UserController@postForgetPassword",
			'as'=>'User.postForgetPassword'
		]);

	Route::get('auth/get-password/{token?}',[
		'uses' => 'user\UserController@getPasswordToken',
		'as' => 'User.getPasswordToken'
	]);

	Route::post('auth/post-password',[
	'uses' => 'user\UserController@postPasswordToken',
	'as' => 'User.postPasswordToken'
]);
 ?>
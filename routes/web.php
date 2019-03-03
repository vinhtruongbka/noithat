<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*
|--------------------------------------------------------------------------
| backend Routes
|--------------------------------------------------------------------------
*/
require_once 'backend.php';

/*
|--------------------------------------------------------------------------
| Post Routes
|--------------------------------------------------------------------------
*/
require_once 'backend/post.php';

/*
|--------------------------------------------------------------------------
| Product Routes
|--------------------------------------------------------------------------
*/
require_once 'backend/product.php';

Route::get('/', function () {
    return view('frontend.masster');
});

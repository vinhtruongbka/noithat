<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Cart;
use Auth;
use App\User;
use App\Role;
use App\Banners;
use App\Product;
use App\Category;
use App\Orders;
use App\Order_detail;

use Illuminate\Http\Request;

class PostController extends Controller
{
     /**
    * Create a new controller instance.
    *
    * @return void
    */
   public function __construct()
   {
       $this->middleware('auth');
   }
	//Post
    public function getPost()
    {
    	return view('backend.post.index');
    }

    public function add()
    {
    	return view('backend.post.add');
    }
    public function category()
    {
    	return view('backend.post.category.index');
    }
}

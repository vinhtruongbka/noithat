<?php

namespace App\Http\Controllers\search;

use Illuminate\Http\Request;
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
use Mail;

class SearchController extends Controller
{
    public function searchProduct(Request $request)
	{
	    $product = Product::where('name', 'LIKE', "%{$request->input('query')}%")->get();
	    return response()->json($product); 
	}

	public function viewProduct(Request $request)
	{
	    $products = Product::where('name', 'LIKE', "%{$request->input('query')}%")->paginate(20);
	    return view('frontend.page.search',compact('products')); 
	}

}

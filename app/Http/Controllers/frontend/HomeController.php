<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Banners;
use App\Product;
use App\Category;

class HomeController extends Controller
{
    public function getIndex()
    {
    	$slides = Banners::all();
    	$hots = DB::table('product')
                     ->where('status', 0)
                     ->limit(4)
                     ->get();
        $products = Category::where('parent',0)->get();
    	return view('frontend.page.home',compact('slides','hots','products'));
    }

}

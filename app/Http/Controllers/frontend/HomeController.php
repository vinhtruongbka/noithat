<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;
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
        $products = Category::where('parent',0)
        			->where('type','product')
        			->get();
    	return view('frontend.page.home',compact('slides','hots','products'));
    }

     public function getCategory($slug)
    {
    	$id = last(explode('-',$slug));
    	$itemCategorys = Category::where('parent',$id)->get();
    	$idCategory = array();
    	foreach ($itemCategorys as $itemCategory) {
    		array_push($idCategory, $itemCategory->id);
    	};
    	$products= Product::where('cat_id',$id)
    			->orwherein('cat_id',$idCategory)
    			->paginate(20);
    	$category = Category::where('id',$id)->where('type','product')->first();

    	$catAll = DB::table('category')
		->join('product', 'category.id', '=', 'product.cat_id')
		->select('category.*', DB::raw("count(product.id) as count"))
		->groupBy('category.name')
		->get();
    	return view('frontend.page.category',compact('products','category','catAll'));
    }

     public function getSell()
    {
    	$products= Product::where('status',0)
    			->paginate(20);

    	$catAll = DB::table('category')
		->join('product', 'category.id', '=', 'product.cat_id')
		->select('category.*', DB::raw("count(product.id) as count"))
		->groupBy('category.name')
		->get();
    	return view('frontend.page.category',compact('products','catAll'));
    }

    public function getProduct($cat,$slug)
    {
    	$id = last(explode('-',$slug));

    	$product= Product::where('id',$id)->first();

    	$category =Category::where('id',$product->cat_id)->where('type','product')->first();

    	$reProducts =Product::where('cat_id',$product->cat_id)->inRandomOrder()->limit(3)->get();

    	$interest = Product::inRandomOrder()->limit(3)->get();
    	return view('frontend.page.detail',compact('product','category','reProducts','interest'));
    }

}

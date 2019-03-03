<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProduct()
    {
    	return view('backend.product.index');
    }

    public function productCategory()
    {
    	return view('backend.product.category.index');
    }
    public function productOrder()
    {
    	return view('backend.product.order.index');
    }
}

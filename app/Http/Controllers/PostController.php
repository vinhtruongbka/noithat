<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
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

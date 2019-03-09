<?php 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Category_relation;

function fooBar(){
        return 'it works!';
    }
function getCategory()
{
	$categories  = Category::where('parent',0)->where('type','product')->get();
    return $categories;
}
   
?>
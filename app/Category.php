<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     protected $table = "category";

     public function sub_category(){
        return $this->hasMany('App\Category', 'parent');
    }
    public function product(){
        return $this->hasMany('App\product', 'cat_id')->limit(5);
    }

    protected $fillable = [
        'name', 'slug','parent','type','status','image','ordering','descriptions'
    ];
}

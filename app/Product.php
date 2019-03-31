<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
     protected $fillable = [
        'name', 'slug','content','image','status','price_ouput','user_id','price_input','cat_id','hot','material','desc'
    ];
}

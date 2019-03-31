<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $table = "order_detail";

    public $timestamps = false;
     protected $fillable = [
        'order_id','product_id','quantity','price'
    ];
    public function product(){
      return $this->hasOne('\App\Product','id','product_id');
    }

    public function order(){
      return $this->hasMany('\App\Order','id','order_id');
    }
}

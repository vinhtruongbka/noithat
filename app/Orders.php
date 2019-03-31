<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
     protected $table = "orders";

      protected $fillable = [
    	'name','user_id','email','phone','address','status'
    ];

    public function user(){
      return $this->hasOne('\App\User','id','user_id');
    }

    public function details(){
      return $this->hasMany('\App\Order_detail','order_id','id');
    }

    public function total_amount(){
        $t = 0;
        if($this->details){
            foreach($this->details as $item) 
                $t = $t + ($item->price * $item->quantity);
        }

        return $t;
    }

    public function total_quantity(){
        $t = 0;
        if($this->details){
            foreach($this->details as $item) 
                $t = $t + $item->quantity;
        }

        return $t;
    }

    public function pays(){
    	return [
    		'direct' => 'Thanh toán khi nhận hàng',
			'atm' => 'Qua tài khoản ngân hàng',
			'baokim' => 'Qua bảo kim',
			'nganluong' => 'Qua Ngân lượng',
			'onepaynd' => 'Qua Onepay nội địa',
			'onepayqt' => 'Qua Onepay quốc tế'
    	];
    }

    public function scopeNotActive($query)
    {
        return $query->where('status', 0);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banners extends Model
{
    protected $table = "banners";

    protected $fillable = [
        'id','name', 'alt','link','descriptions','status','ordering','descriptions'
    ];
}

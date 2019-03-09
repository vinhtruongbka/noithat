<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{
	protected $table = "roles";
    protected $fillable = [
        'id', 'name','created_at','description', 'updated_at'];

    public function users(){
		  return $this->belongsToMany(User::class);
		}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded=[];
      // Get the user of a particular order
   public function user(){

     return $this->belongsTo(\App\User::class);
   }


public function station() {
	return $this->belongsTo(\App\Station::class);
}
}

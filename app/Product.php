<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

   protected $guarded=[];
    //presentprice
    public function presentPrice() {
      return money_format('Ksh %i',$this->price);
    }

    public function owner(){
      return $this->belongsTo(\App\User::class);
    }

    public function agrovet(){
      return $this->belongsTo(\App\Agrovet::class);
    }
    //pu
    public function orders() {
      return $this->hasMany(\App\ProductDetail::class);
    }
}

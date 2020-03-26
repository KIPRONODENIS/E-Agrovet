<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $guarded=[];

    public function user() {
      return $this->belongsTo(\App\User::class);
    }
    public function product() {
      return $this->belongsTo(\App\Product::class);
    }
    public function agrovet() {
      return $this->belongsTo(\App\Agrovet::class);
    }


}

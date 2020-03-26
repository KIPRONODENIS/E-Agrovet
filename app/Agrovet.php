<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agrovet extends Model
{
  protected $guarded=[];

  public function orders(){
    return $this->hasMany(\App\ProductDetail::class);
  }
}

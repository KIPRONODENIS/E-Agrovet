<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agrovet extends Model
{
  protected $guarded=[];
 public $total=0;
  public function orders(){
    return $this->hasMany(\App\ProductDetail::class);
  }

  public function scopeTotal() {
$this->total=0;
  $this->orders->each(function($q){
$this->total+= $q->product->price * $q->quantity;
  	});

  return $this->total;
  }


public function withdraws(){
	return $this->hasMany(\App\Withdraw::class)->sum('amount');
}
public function withdrawals(){
	return $this->hasMany(\App\Withdraw::class);
}


public function scopeBalance(){
	return $this->total()-$this->withdraws();
}

}

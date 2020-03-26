<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service_orders extends Model
{
    protected $guarded=[];

    public function owner() {
      return $this->belongsTo(\App\User::class,'service_provider');
    }

    public function service() {
      return $this->belongsTo(\App\Service::class,'service_id');
    }

}

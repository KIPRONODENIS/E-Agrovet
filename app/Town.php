<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    protected $guarded=[];

    public function stations(){
    	return $this->hasMany(\App\Station::class,'town_id');
    }
}

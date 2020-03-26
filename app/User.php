<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','user_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function services() {
      return $this->hasMany(\App\Models\Service::class);
    }


public function products() {
  return $this->hasMany(\App\Product::class);
}





     /**
      *
      *Get orders
      *
      */
      public function orders() {
        return $this->hasMany(\App\Order::class);
      }

      //agrovet the user has
      public function agrovet(){
        return $this->hasOne(\App\Agrovet::class);
      }

      // reorders
      public function recievedOrders() {

      return $this->hasManyThrough(\App\ProductDetail::class, \App\Product::class);

      }

      public function vetUser() {
        return $this->hasMany(\App\service_orders::class);
      }

      public function vetOrders() {
        return $this->hasMany(\App\service_orders::class,'service_provider');
      }

      public function vetServices() {
        return $this->hasMany(\App\Service::class);
      }
 //user orders from vet doctor

      public function serviceOrders() {
        return $this->hasMany(\App\service_orders::class,'user_id');
      }
}

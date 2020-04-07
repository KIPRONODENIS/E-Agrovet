<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Revenue;
use App\Agrovet;
use App\User;

use App\Service;
use App\Order;
use App\Withdraw;
class Report extends Component
{

  // $period=Carbon::now()->subWeeks(1);
  // //users 
  // $users=User::where('created_at','>',$period)->count();
  // //
  // $revenue=Revenue::where('created_at','>',$period)->sum('amount');
  // $agrovets=Agrovet::where('created_at','>',$period)->count();
  // $withdrawals=Withdraw::where('created_at','>',$period)->count();
  // $services=Service::where('created_at','>',$period)->count();

  public $period;
  public $time;
  public $users;
  public $revenue;
  public $agrovets;
  public $withdrawals;
  public $services;
  public $orders;

 public function mount(){
 	$this->time=1;
 	switch($this->time) {
 		case 1:
        $this->period=Carbon::now()->subWeeks(1)->toString();
 		break;
 		 case 2:
        $this->period=Carbon::now()->subMonths(3)->toString();
 		break;

 		 case 3:
        $this->period=Carbon::now()->subMonths(6)->toString();
 		break;

 		case 4:
        $this->period=Carbon::now()->subMonths(12)->toString();
 		break;
 	}
 $this->users=User::where('created_at','>',new Carbon($this->period))->count();
  
  $this->revenue=Revenue::where('created_at','>',new Carbon($this->period))->sum('amount');
  $this->agrovets=Agrovet::where('created_at','>',new Carbon($this->period))->count();
  $this->withdrawals=Withdraw::where('created_at','>',new Carbon($this->period))->count();
  $this->services=Service::where('created_at','>',new Carbon($this->period))->count();
  $this->orders=Order::where('created_at','>',new Carbon($this->period))->count();

 }
    public function render()
    {
        return view('livewire.report');
    }
}

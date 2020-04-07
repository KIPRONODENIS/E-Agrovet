<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Revenue;
use App\Agrovet;
use App\User;

use App\Service;
use App\Order;
use App\Withdraw;
use App\Station;
class AdminController extends Controller
{




   public function index() {
  
  $revenue=Revenue::sum('amount');
  $agrovets=Agrovet::count();
$customers=User::count();
  $providers=User::whereHas('services')->count();
  $payments=Revenue::count();
  $services=Service::count();
  $orders=Order::count();
  $withdrawals=Withdraw::sum('amount');
  $stations=Station::count();



   	session()->flash('active','dashboard');
     return view('admin.index',compact(
'revenue',
'agrovets',
'customers',
'providers',
'payments',
'services',
'orders',
'withdrawals',
'stations'
     ));

   } 
     public function agrovets() {
  
   	 	session()->flash('active','agrovets');
      $agrovets=Agrovet::all();
     return view('admin.agrovets',compact('agrovets'));
   }
     public function customers() {
      $customers=User::where('id','!=',\Auth::id())->get();
   	   	session()->flash('active','customers');
     return view('admin.customers',compact('customers'));
   }
        public function orders() {

   		session()->flash('active','orders');
        $orders=Order::all();
     return view('admin.orders',compact('orders'));
   }
        public function payments() {

   	  		session()->flash('active','payments');
     return view('admin.payments');
   }
           public function providers() {
   	 $providers=User::whereHas('services')->with('services')->get();
   	session()->flash('active','providers');
     return view('admin.providers',compact('providers'));
   }
           public function revenue() {
   
session()->flash('active','revenue');
  $revenues=Revenue::all();
     return view('admin.revenue',compact('revenues'));
   }
              public function services() {
   	  $services=Service::all();
   	session()->flash('active','services');
     return view('admin.services',compact('services'));
   }

    public function withdrawals() {
$withdrawals=Withdraw::with('agrovet')->get();

   		session()->flash('active','withdrawals');
     return view('admin.withdrawals',compact('withdrawals'));
   }
       public function report() {

   	session()->flash('active','report');
     
  // $lastOneWeek=Carbon::now()->subWeeks(1);
  // //users 
  // $users=User::where('created_at','>',$lastOneWeek)->count();
  // //
  // $revenue=Revenue::where('created_at','>',$lastOneWeek)->sum('amount');
  // $agrovets=Agrovet::where('created_at','>',$lastOneWeek)->count();
  // $withdrawals=Withdraw::where('created_at','>',$lastOneWeek)->count();
  // $services=Service::where('created_at','>',$lastOneWeek)->count();


     return view('admin.report',compact(''));
   }


   public function destroyRevenue(Revenue $revenue){
  $revenue->delete();
  \Alert::success('success','Successfully deleted');
  return redirect()->back();

   }

   public function agrovetView(Agrovet $agrovet){
  return view('admin.pages.agrovet-view',compact('agrovet'));
   } 


     public function agrovetEdit(Request $request,Agrovet $agrovet){
$request->validate([
'name'=>'required|min:3'
]);
$agrovet->update(['name'=>$request->name]);
return redirect()->back()->with('success','Successfully updated ');
   }

  public function agrovetDelete(Agrovet $agrovet){

    $agrovet->delete();
    \Alert::error('success','Deleted successfully');
  return redirect()->back();
   }

      public function ProviderView(User $provider){


  return view('admin.pages.provider',compact('provider'));
   } 


     public function ProviderDestroy(User $provider){

    $provider->delete();
    \Alert::error('success','Deleted successfully');
  return redirect()->back();
   }


public function ServiceEdit(Service $service){
return view('admin.pages.edit-service',compact('service'));
}


public function show(User $user) {
 
 return view('admin.pages.user-view',compact('user'));
}
public function update(User $user) {
  dd('it will show here');
}
public function destroy(User $user) {

$user->delete();
return redirect()->back()->with('success',"{$user->name} deleted successfully");
}

public function destroyWithdraw(Withdraw $withdraw){
$withdraw->delete();
return redirect()->back()->with('success',"Withdraw deleted successfully");
}

public function updateOrder(Request $request, Order $order) {
  $order->update([
'status'=>$request->status
  ]);

  \Alert::success('success',"Order Updated Successfully");

  return redirect()->back();
}
}

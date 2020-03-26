<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $user=auth()->user();
      if($user->hasRole('admin')) {
        return redirect()->route('admin.home');
      }else if($user->hasRole('vet')) {
        return redirect()->route('vet.home');
      }else if($user->hasRole('agrovet')) {
        return redirect()->route('agrovet.home');
      }else {

$orders=auth()->user()->orders()->orderBy('created_at','desc')->get();

//what about the service orders
$service_orders=auth()->user()->serviceOrders;

     //LEST FIND THE ORDERS FOR THIS USER
return view('home',compact('orders','service_orders'));

          }
    }
}

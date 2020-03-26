<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\service_orders;
use App\Service;
class VetController extends Controller
{
  public function index() {
    $orders=\Auth::user()->vetOrders;
    return view('vet.index',compact('orders'));
  }

  //functio  to update statid
    public function vetUpdate(Request $request, service_orders $order){

$order->update(['status'=>$request->status]);
\Alert::success(" status Updated"," Successfully updated status ");
return redirect()->back();
    }

    public function services() {
      $services=\Auth::user()->vetServices;
      return view('vet.services',compact('services'));
    }

    //function to create

    public function create() {

      return view('vet.create');
    }

    public function store(Request $request) {

    $request->validate([
  'name'=>'required|min:3',
  'details'=>'required|min:10',
  'image'=>'required|image',
  'location'=>'required|min:2'

    ]);

    $service=  Service::create([
        'name'=>$request->name,
        'details'=>$request->details,
        'image'=>$request->image->store('images',['disk'=>'public']),
        'user_id'=>\Auth::id(),
        'location'=>$request->location
      ]);

      \Alert::success("created","Service was created Successfully");

      return redirect()->back();
    }

    public function edit(Service $service) {
      return view('vet.edit',compact('service'));
    }

    public function update(Request $request,Service $service){
      $request->validate([
    'name'=>'required|min:3',
    'details'=>'required|min:10',
    'location'=>'required|min:2'

      ]);

      if($request->hasFile('image')) {
        $image=$request->image->store('images',['disk'=>'public']);

      }else {
        $image=$service->image;
      }

//now lets update it
$service->update([
      'name'=>$request->name,
      'details'=>$request->details,
      'image'=>$image,
      'user_id'=>\Auth::id(),
      'location'=>$request->location
]);

\Alert::success('Updated',"Service update Successful");

return redirect()->back();
    }

    public function destroy(Service $service) {
  $service->delete();
  \Alert::success('Deleted',"Service was Deleted");
  return redirect()->back();
    }


public function profile() {
  return view('vet.profile');
}
}

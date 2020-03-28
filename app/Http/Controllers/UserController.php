<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\User;
use App\Revenue;
class UserController extends Controller
{
  /**
   * contact  the specified user
   *
   * @param  \App\Models\services  $services
   * @return \Illuminate\Http\Response
   */
  public function contact(Service $service)
  {
      return view('User.contact');
  }
  /**
   * update  the specified user
   *
   * @param  \App\Models\services  id
   * @return \Illuminate\Http\Response
   */
public function update(Request $request) {
    $id=$request->id;
    $name=$request->name;
    $value=$request->value;
    $updated=User::find($id)->update(["{$name}"=>$value]);
    $message=$updated?"success":"0";
  return response()->json(['message'=>$message]);
}


public function profile() {
  return view('user.profile');
}
public function subscribe() {
$user = \Auth::user();
$plan = app('rinvex.subscriptions.plan')->first();

$user->newSubscription('main', $plan);

    Revenue::create([
    'user_id'=>\Auth::id(),
    'amount'=>$plan->price,
    'description'=>'Subscription cost'
    ]);

return redirect()->back()->with('success!!','You now have access to all our services!');
}



public function updateName(Request $request){

$request->validate([
'name'=>'required'
]);

//update 
\Auth::user()->update([
'name'=>$request->name
]);

 return redirect()->back()->with('success','Name Updated Successfully');
}

public function updateEmail(Request $request){
  $request->validate([
'email'=>'required'
]);

  \Auth::user()->update([
'email'=>$request->email
]);

   return redirect()->back()->with('success','Email Updated Successfully');

}
}

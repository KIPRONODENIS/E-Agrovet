<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\User;
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
}

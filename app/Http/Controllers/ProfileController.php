<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class ProfileController extends Controller
{
    public function name(Request $request){
   $request->validate([
    'name'=>'required|min:3|max:50'
    	]);
  Auth::user()->update([
 'name'=>$request->name
  ]);

return redirect()->back()->with('success','Name successfully Updated');
    }
     public function email(Request $request){
   $request->validate([
    'email'=>'required|min:3|max:50'
    	]);

  Auth::user()->update([
 'email'=>$request->email
  ]);

return redirect()->back()->with('success','Email successfully Updated');
    }
}

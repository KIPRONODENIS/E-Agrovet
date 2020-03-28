<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Withdraw;
use Alert;
use Auth;
class WithdrawController extends Controller
{
    public function withdraw(Request $request) {

 $request->validate([
 'amount'=>'required|numeric|min:100',
 'phone'=>'required|min:10|max:10'
 ]);

  Withdraw::create([
'agrovet_id'=>Auth::user()->agrovet->id,
'amount'=>$request->amount,
'phone'=>$request->phone
  ]);

Alert::success('success','You have withdrawn '. $request->amount);

return redirect()->back();
    }
}

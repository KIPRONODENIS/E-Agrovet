<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agrovet;
use App\Product;
use Carbon\Carbon;
class AgrovetController extends Controller
{
  public function index() {

  $agrovet=\Auth::user()->agrovet;
  if(is_null($agrovet)){
    $todays=collect([]);
    $orders=collect([]);

  }else {
  $todays=$agrovet->orders()->with('product','user')->where('created_at','>', Carbon::today())->get();


  $orders=$agrovet->orders()->with('product','user')->get();
}

    return view('agrovet.index',compact('orders','todays'));

  }

  public function products() {
   $products=\Auth::user()->products;
    return view('agrovet.products',compact('products'));

  }

  public function profile() {

    return view('agrovet.profile');

  }


  public function create(Request $request) {
    $request->validate([
    'name'=>'required|min:3',
    'town'=>'required'

    ]);

    $agrovet=Agrovet::create([

     'name'=>$request->name,
     'user_id'=>\Auth::id(),

     'town'=>$request->town
    ]);

\Alert::success('congratulations', 'You have created an Agrovet');
    return redirect()->back();
  }

  //update the agrovet name
  public function updateAgrovet(Request $request,Agrovet $agrovet) {
    $request->validate([
    'name'=>'required|min:3',
    'town'=>'required'

    ]);

    $agrovet->fill([

     'name'=>$request->name,
     'town'=>$request->town
    ])->save();

\Alert::success('congratulations', 'You have Updated an Agrovet');
    return redirect()->back();
  }


//FIUNCTON TO CREATE PRODUCT

public function create_product(Request $request) {
return view('agrovet.create');

}


//public function to store the new product

public function store( Request $request) {
if(is_null(\Auth::user()->agrovet)) {

\Alert::error("No Agrovet","Please create an Agrovet in the DashboardLa");
  return redirect()->back();
}
$request->validate([
'name'=>'required',
'stock'=>'required',
'image'=>'file|image',
'description'=>'required|min:10',
'price'=>'required'

]);

//now lest crate the product
$product=Product::create([
'name'=>$request->name,
'stock'=>$request->stock,
'image'=>$request->image->store('products',['disk'=>'public']),
'description'=>$request->description,
'price'=>$request->price,
'user_id'=>\Auth::id(),
'agrovet_id'=>\Auth::user()->agrovet->id

]);


\Alert::success("Congrats","Product was created successfully");

return redirect()->back();
}

//function to show edit view
public function edit(Product $product) {
  return view('agrovet.edit',compact('product'));
}

//function to update view
public function update(Request $request,Product $product) {

  $request->validate([
  'name'=>'required',
  'stock'=>'required',
  'description'=>'required|min:10',
  'price'=>'required'

  ]);

if($request->hasFile('image')) {
  $image=$request->image->store('products',['disk'=>'public']);

}else {
  $image=$product->image;
}

//now update the product

$product->update([

  'name'=>$request->name,
  'stock'=>$request->stock,
  'description'=>$request->description,
  'price'=>$request->price,
  'image'=>$image
]);

//seent the success message
session()->flash('success',"Product updated successfully");
return redirect()->back();
}

public function destroy(Product $product) {

  $product->delete();
  session()->flash('success',"Product Deleted Successfully");
  return redirect()->back();
}
}

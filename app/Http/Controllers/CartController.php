<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;
use App\Setting;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $product = Product::find($request->input('id'));
      $update=$request->update ?? "";

//if the request is to update the run this code
      if($update=='update') {
        Cart::update($product->id, array(
  'quantity' => array(
      'relative' => false,
      'value' => $request->input('qty')
  ),
));


          return redirect()->back()->with('success', 'Item added to cart successfully.');
      } 
      //else continue



          $options = $request->except('_token', 'id', 'price', 'qty','update');
    $shipping=Setting::find(1)->price;
          //add condition
          $itemCondition2 = new \Darryldecode\Cart\CartCondition(array(
    'name' => 'Shipping Fee',
    'type' => 'promo',
    'target' => 'total',
    'value' =>-$shipping,
    'order' => 1
));
      Cart::condition($itemCondition2);
//append options


          $options[]=['image'=>$product->image,'by'=>$product->agrovet->name,'status'=>'instock','shipping'=>$shipping];
          Cart::add($product->id, $product->name, $product->price ,$request->input('qty'), $options);

          return redirect()->back()->with('success', 'Item added to cart successfully.');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the all resource from cart
     *
     * @param  int  $none
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {


    return redirect('/');
    }

    /**
     * Remove the specified resource from cart
     *
     * @param  int  $none
     * @return \Illuminate\Http\Response
     */
    public function remove()
    {

    Cart::remove(request()->only('id'));
    // example:


    return redirect()->back()->with('success',"successfully deleted");
    }
}

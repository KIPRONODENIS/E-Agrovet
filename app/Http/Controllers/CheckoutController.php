<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Order;
use App\ProductDetail;
use App\Product;
class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('checkout');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
//valite the Data
$data=$request->validate([
  'phone'=>'required',
  'town'=>'required',
  'station'=>'required',
  
]);

      //
    $serialized = serialize(Cart::getContent());
  //do  the mpesa thing here
  $order=new Order([
    'phone'=>request()->phone,
    'town_id'=>request()->town,
    'station_id'=>request()->station,
   
    'cart_data'=>$serialized,
    'total'=>Cart::getSubTotal(),
    'items'=>Cart::getTotalQuantity(),
]);
 $order=\Auth::user()->orders()->save($order);

//inser into product details
foreach(Cart::getContent() as $item) {

$product_details[]=ProductDetail::create([
"order_id"=>$order->id,
"user_id"=>\Auth::id(),
"product_id"=>$item['id'],
"quantity"=>$item['quantity'],
"agrovet_id"=>Product::find($item['id'])->agrovet->id
]);
}

// the stock is
$stock=Product::find($item['id'])->stock;
$updated=$stock-$item['quantity'];
Product::find($item['id'])->update(['stock'=>$updated]);

  return redirect()->route('thankyou')->with('success',"Successfully Placed the Order");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

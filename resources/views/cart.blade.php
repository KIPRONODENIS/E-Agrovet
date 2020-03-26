@extends('layouts.app')

@section('body')

<div class="cart  " >
@component('components.navbarComponent')

@endcomponent
<div class=" my-3 bg-green-2 ml-4">
<h1 class="h1 bold">Shopping cart</h1>
</div>

<div class="container mt-5 text-center">

    <div class="row ml-10">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
          @if (\Cart::isEmpty())
              <p class="alert alert-warning">Your shopping cart is empty.</p>
          @else
            <table class="table table-hover border-none">

                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach(\Cart::getContent() as $item)

                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="{{asset('storage/'.$item->attributes->first()['image'])}}" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#">{{$item->name}}</a></h4>
                                <h5 class="media-heading"> by <a href="#">
                                  {{$item->attributes->first()['by']}}
                                         </a></h5>
                                <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <var class="price">{{ $item->quantity }}</var>
                              @component('components.addToCartComponent')
       @slot('id')
        {{$item->id}}
       @endslot

        @slot('update')
        {{'update'}}
        @endslot

             @slot('title')
        {{'Edit qty '}}
        @endslot

       @slot('stock')
        @php 
$stock=App\Product::find($item->id)->stock;
        @endphp
        {{$stock}}
       @endslot



      @endcomponent
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>{{$item->price}}</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>{{ $item->getPriceSum()}}</strong></td>
                        <td class="col-sm-1 col-md-1">
                          <form method="post" action="{{route('cart.remove')}}">
                         @csrf

                         <input type="hidden" name="id" value="{{$item->id}}">

                        <button type="submit" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> Remove
                        </button></td>
                      </form>
                    </tr>
                    @endforeach

                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong>{{ config('settings.currency_symbol')?? "Ksh." }}{{ \Cart::getSubTotal() }}</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Estimated shipping</h5></td>
                        <td class="text-right"><h5><strong>{{$item->attributes->first()['shipping']}}</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong>{{\Cart::getTotal()}}</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td colspan="2">
                          <a href="{{route('products.index')}}" class="btn bg-yellow-500">
                            <span class="fa fa-shopping-basket fa-2x"></span>Go Shopping
                          </a></td>

                        <td>
                        <a  class="btn btn-success" href="{{route('checkout.index')}}">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </a></td>
                    </tr>
                </tbody>


            </table>

            @endif
        </div>
    </div>
</div>
@endsection

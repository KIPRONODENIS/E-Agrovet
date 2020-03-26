@extends('layouts.app')
@section('body')
@component('components.navbarComponent')

@endcomponent
<form class="row" action="{{route('checkout.create')}}" method="post">
  @csrf
<div class="col-md-7">

  @livewire('checkout')
</div>
<div class="spacer"></div>
<div class="col-md-4 py-5">
<hr class="w-1/3">
<h1 class="h1 ">Your Order</h1>
<hr class="w-1/3">
<table class="table table-responsive mr-2 pr-3">
@foreach(\Cart::getContent() as $item)
<tr>
    <td class="col-sm-8 col-md-6">
    <div class="media">
        <a class="thumbnail pull-left mr-2" href="#"> <img class="media-object" src="/images/{{$item->attributes->first()['image']}}" style="width: 72px; height: 72px;"> </a>
        <div class="media-body">
            <h4 class="media-heading"><a href="#">{{$item->name}}</a></h4>
            <h5 class="media-heading"> by <a href="#">
              {{$item->attributes->first()['by']}}
                     </a></h5>

        </div>
    </div></td>
    <td class="col-sm-1 col-md-1" style="text-align: center">
    <strong class="price">{{ $item->quantity }}</strong>
    </td>
    <td class="col-sm-1 col-md-1 text-center"><strong>Ksh{{$item->price}}</strong></td>
    <td class="col-sm-1 col-md-1 text-center"><strong>Ksh.{{ $item->getPriceSum()}}</strong></td>


</tr>

@endforeach

                    <tr>

                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong>{{ config('settings.currency_symbol')?? "Ksh." }}{{ \Cart::getSubTotal() }}</strong></h5></td>
                    </tr>
                    <tr>

                        <td>   </td>
                        <td>   </td>
                        <td><h5>Estimated shipping</h5></td>
                        <td class="text-right"><h5><strong>{{$item->attributes->first()['shipping']}}</strong></h5></td>
                    </tr>
                    <tr>

                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong>{{\Cart::getTotal()}}</strong></h3></td>
                    </tr>
</table>
</div>
<div class="col-md-1"></div>
</form>


@endsection

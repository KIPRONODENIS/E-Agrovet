@extends('layouts.app')

@section('body')
<div class="product-section " >
@component('components.navbarComponent')

@endcomponent
<div class="container mt-10 ">

 <div class="row container ">
 <div class="col-md-2"></div>
 <div class="col-md-4 mt-4">
   <img class="img-thumbnail" src="{{asset('storage/'.$product->image)}}">
 </div>
 <div class="col-md-4">
   <h1 class="h1 font-bold bolder">{{$product->name}}</h1>

   <h3 class="h4 text-grey-600">{{$product->details}}</h3>
   <h3 class="h4 text-green-900 bold">{{$product->presentPrice()}}</h3>
   <p class="lead text-gray-500">{{$product->description}} </p>
   @component('components.addToCartComponent')
    @slot('id')
     {{$product->id}}
    @endslot
    @guest
   <button type="submit" class=" my-3 w-3/4 shadow-sm bg-yellow-500 p-2 m-auto text-center text-white rounded">Add to Cart</button>
    @else
    @if($product->user_id==auth()->user()->id)
<a class="btn btn-primary" href="{{route('agrovet.products')}}">Back</a>
  @else
   <button type="submit" class=" my-3 w-3/4 shadow-sm bg-yellow-500 p-2 m-auto text-center text-white rounded">Add to Cart</button>
    @endif
@endguest
   @endcomponent

 </div>
 </div>
 </div>

</div>
@endsection

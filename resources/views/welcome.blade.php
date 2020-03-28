@extends('layouts.app')

@section('body')
<div class="hero-section text-center " >
@component('components.navbarComponent')

@endcomponent
@component('components.heroComponent')

@endcomponent
</div>

<div id="featured " class="my-4 mx-4 shadow-sm">
  <h1 class=" display-4 text-center py-2 text-yellow-500">Featured Products</h1>
<div class=" text-left flex content-between flex-wrap mt-5 pt-2 ">


 @foreach($products as $item)
  @component('components.productComponent')
@slot('name')
{{$item->name}}
@endslot

@slot('owner')
{{$item->agrovet->name ?? "MALUKE AGROVET"}}
@endslot

@slot('price')
{{$item->presentPrice()}}
@endslot

@slot('image')
{{$item->image}}
@endslot

@slot('id')
{{$item->id}}
@endslot

@slot('stock')
 {{$item->stock}}
@endslot

@slot('route')
{{route('products.show',$item->id)}}
@endslot

  @endcomponent
  @endforeach
</div>
<div class="w-full text-center mx-auto my-4 p-4 ">
<a href="{{route('products.index')}}" class="w-90 shadow bg-teal-400 hover:bg-teal-400 p-2 m-auto text-center text-white rounded " style="font-size:20px">See More Products</a>
</div>
</div>

<div id="featured " class="my-4 mx-4 shadow-sm">
  <h1 class=" display-4 text-center py-2 text-yellow-500">Featured  Services</h1>
<div class=" text-left flex content-between flex-wrap mt-5 pt-2  justify-content-center">
 @foreach($services as $item)
 @component('components.service')
   @slot('image')
{{$item->image}}
   @endslot
   @slot('name')
{{$item->name}}
   @endslot
   @slot('id')
{{$item->id}}
   @endslot

@slot('user')
{{$item->user->name}}
@endslot

 @endcomponent
@endforeach

  <div>
</div>

<div class="w-full text-center mx-auto my-6 p-4">
  <a href="{{route('services.index')}}" class="w-90 shadow bg-teal-400 hover:bg-teal-400 p-2 m-auto text-center text-white rounded " style="font-size:20px">See More Services</a>
</div>

@endsection

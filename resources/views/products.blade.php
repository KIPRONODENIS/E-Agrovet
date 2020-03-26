@extends('layouts.app')
@section('body')
@component('components.navbarComponent')

@endcomponent
<div class="  products-page py-3 text-center">
<h1 class="h1">Our Products</h1>
</div>

<div class="product-main container mt-5">
<div class="row">
 <!-- <div class="col-md-4 ">
<h1 class="h4 lead ml-3" style="font-weight:600">By Category</h1>
  <ul class="list-group w-3/4 text-center">
   <li class="list-group-item border-none my-2 active"><a href=""> Insecticides</a></li>
   <li class="list-group-item border-none my-2 "><a href=""> Pesticides</a></li>
   <li class="list-group-item border-none my-2"><a href=""> Sprayers</a></li>
   <li class="list-group-item border-none my-2"><a href=""> Equipments</a></li>
   <li class="list-group-item border-none my-2"><a href=""> Farm Supplements</a></li>
  </ul>
 </div> -->
 <div class="col-md-10 mx-auto">
<!-- <h1 class="h4 lead bold" style="font-weight:600">Insecticides</h1> -->
<div class="flex flex-wrap">

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
 </div>
</div>
</div>
@endsection

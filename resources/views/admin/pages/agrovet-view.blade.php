@extends('layouts.admin')
@section('content')
<div class=" m-2 p-1 shadow h1">{{$agrovet->name}} Agrovet</div>
<div class="" >
	<h4 class="h2 tracking-wider m-2 p-2 text-gray-500">Products</h4> 
	<ul class="unstyled">
		@foreach($agrovet->user->products as $product)
    <li class="m-2 p-2 shadow bg-green-200">{{$product->name}}</li>
		@endforeach
	</ul>
</div>
@endsection

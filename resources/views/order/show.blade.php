@extends('layouts.app')

@section('body')
@component('components.navbarComponent')

@endcomponent
<div class="container card">
<div class="card-header">Order Details</div>
<p class="lead text-xl font-bold m-1 p-1 "><strong>Order ID:</strong>{{$order->id}}<p>
<p class="lead text-xl font-bold m-1 p-1"><strong>Order Total:</strong>Kshs.{{$order->total}}<p>
<p class="lead text-xl font-bold m-1 p-1"><strong>Order Status:</strong>{{$order->status}}<p>

<div class="card mb-2">
<div class="card-header bg-white">
<h1 class="h1 font-bold text-teal-500">Products</h1>
<div class="card-body">
<table class="table table-responsive">
<thead>
<tr>
<th>#</th>
<th>Image</th>
<th>Name</th>
<th>quantity</th>
<th>Agrovet</th>
</tr>
</thead>
<tbody>
@foreach(unserialize($order->cart_data) as $item)

<tr>
<td>{{$loop->index+1}}</td>
<td>
<img src="{{asset('storage/'.$item->attributes->first()['image'])}}" class="img-thumbnail" height="100" width="100">
</td>
<td>{{$item->name}}</td>
<td>{{$item->quantity}}</td>
<td>{{$item->attributes->first()['by']}}</td>
</tr>

@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>

@endsection

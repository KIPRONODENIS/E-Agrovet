
@extends('layouts.app')
@section('body')
@component('components.navbarComponent')

@endcomponent
@include('partials.agrovetNav')
<div class="col-md-10 h-screen mx-auto bg-green-200">
  <div class="products card bg-white p-3 d-flex justify-content-end">
<span class="h2">Your Products</sspan>
<a class="btn btn-primary  text-white text-xl" href="{{route('agrovet.product.create')}}">New Product</a>
</div>
<table class="table table-responsive">
 <thead>
<tr>
<th>#</th>
<th>Product Name</th>
<th>Remaining</th>
<th>Price</th>
<th>Image</th>
<th>Ordered</th>
<th>Action</th>
</tr>
 </thead>

 <tbody>
   @foreach($products as $product)
   <tr>
     <td>{{$loop->index+1}}</td>
   <td>{{$product->name}}</td>
   <td>{{$product->stock}}</td>
   <td>ksh. {{$product->price}}</td>
   <td><img src="{{asset('storage/'.$product->image)}}" height="100" width="100"></td>
   <td>{{$product->orders->count()}}</td>
   <td class="flex justify-around">
<a href="{{route('products.show',$product->id)}}" class="btn btn-success text-white">View</a>
<a href="{{route('agrovet.product.edit',$product->id)}}" class="btn btn-primary text-white mx-1">Edit</a>
<a href="{{route('agrovet.product.delete',$product->id)}}" class="btn btn-danger text-white">Delete</a>
   </td>
   </tr>
@endforeach

</tbody>
</table>
</div>
@endsection

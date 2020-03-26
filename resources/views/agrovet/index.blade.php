
@extends('layouts.app')
@section('body')
@component('components.navbarComponent')

@endcomponent
<div class="nav my-2  bg-green-200 w-full col-md-10 mx-auto">
  <ul class="nav nav-pills my-3 col-md-8 mx-auto">
    	<li class="nav-item "><a href="{{route('agrovet.home')}}" class="nav-link  active">Home</a></li>
    	<li class="nav-item"><a href="{{route('agrovet.products')}}" class="nav-link">  Products</a></li>
    	<li class="nav-item"><a href="{{route('agrovet.profile')}}" class="nav-link">Profile</a></li>
      @if(is_null(auth()->user()->agrovet))
      	<li class=" bg-white w-100 mt-5 p-3 text-md font-bold">Create Your Agrovet Now!!<a class="btn btn-success float-right"  data-toggle="modal" data-target="#myModal">Create An Agrovet</a></li>
   @else
   <li class="btn bg-white w-100 mt-5">Your Agrovet is:<strong> {{auth()->user()->agrovet->name}}</strong> and Location is <strong>{{auth()->user()->agrovet->town}}</strong>
<a class="btn btn-success text-white"  data-toggle="modal" data-target="#edit">Edit An Agrovet</a>
   </li>

   @endif
    </ul>
</div>
<!-- //create form -->
<div id="myModal" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <form  method="post" action="{{route('agrovet.create')}}">
        @csrf
      <div class="modal-header">
          <h4 class="modal-title">Create An Agrovet</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>
      <div class="modal-body">

<div class="form-group">
<label>Agrovet Name:</label>
<input type="text" name="name" class="form-control" value="{{old('name')}}">
<label>Select Town:</label>
<select class="form-control" name="town">
<option value="Meru">Meru </option>
<option value="Makutano">Makutano </option>
<option value="Kianjai">Kianjai </option>
</select>
</div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" >Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>

  </div>
</div>

      @if(!is_null(auth()->user()->agrovet))
<!-- //edit form -->
<div id="edit" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <form  method="post" action="{{route('agrovet.update',auth()->user()->agrovet->id)}}">
        @csrf
        @method('put')
      <div class="modal-header">
          <h4 class="modal-title">Edit Agrovet</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>
      <div class="modal-body">

<div class="form-group">
<label>Agrovet Name:</label>
<input type="text" name="name" class="form-control" value="{{auth()->user()->agrovet->name}}">
<label>Select Town:</label>
<select class="form-control" name="town">
<option  value="Meru" @if(auth()->user()->agrovet->town=="Meru") {{"selected"}} @endif>Meru </option>
<option value="Makutano" @if(auth()->user()->agrovet->town=="Makutano") {{"selected"}} @endif>Makutano </option>
<option value="Kianjai" @if(auth()->user()->agrovet->town=="Kianjai") {{"selected"}} @endif>Kianjai </option>
</select>
</div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" >Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>

  </div>
</div>
@endif
<div class="  col-md-10 mx-auto ">
<div class="card-header bg-green-500 shadow text-white"><h1 class="h2"> Today's Orders<h1></div>
<div class=" bg-green-200 shadow">
<table class="table table-responsive">
<thead>
<tr>
<th>#</th>
<th>Product Name</th>
<th>quantity</th>
<th>Customer</th>

<th>Date Placed</th>
<th>Status</th>

<th>Price</th>
<th>Total</th>

<th>Action</th>
</tr>
</thead>
<tbody>
  @foreach($todays as $today)

<tr>
<td>{{$loop->index+1}}</td>
<td>{{$today->product->name ?? ""}}</td>
<td>{{$today->quantity}}</td>
<td>{{$today->user->name}}</td>

<td>{{$today->created_at->diffForHumans()}}</td>
<td>{{$today->status}}</td>

<td>Kshs.{{$today->product->price}}</td>
<td>Kshs. {{$today->product->price * $today->quantity }}</td>
<td>
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Update
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

</td>
</tr>

@endforeach
</tbody>
</table>
</div>
</div>

<div class="  col-md-10 mx-auto mt-5">
<div class="card-header bg-green-400 shadow text-white"><h1 class="h2"> All  Orders<h1></div>
<div class=" bg-green-200 shadow">
<table class="table table-responsive">
<thead>
<tr>
<th>#</th>
<th>Product Name</th>
<th>quantity</th>
<th>Customer</th>
<th>Price</th>
<th>Total</th>
</tr>
</thead>
<tbody>
  @foreach($orders as $order)
<tr>
<td>{{$loop->index+1}}</td>
<td>{{$order->product->name}}</td>
<td>{{$order->quantity}}</td>
<td>{{$order->user->name}}</td>
<td>Kshs.{{$order->product->price}}</td>
<td>Kshs. {{$order->product->price * $order->quantity }}</td>
</tr>
@endforeach

</tbody>
</table>
</div>
</div>
@endsection

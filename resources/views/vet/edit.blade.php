@extends('layouts.app')
@section('body')
@component('components.navbarComponent')

@endcomponent

<div class="jumbotron h-screen">
  <div class="shadow w-3/4 mx-auto p-1">
  <ul class="nav nav-pills my-3 col-md-8 mx-auto">
    	<li class="nav-item "><a href="{{route('home')}}" class="nav-link ">Home</a></li>
    	<li class="nav-item"><a href="{{route('vet.services')}}" class="nav-link  active">  Services</a></li>
    	<li class="nav-item"><a href="#" class="nav-link">Profile</a></li>
    </ul>
  </div>

  <div class="shadow w-3/4 mx-auto p-1">
<h1 class="h3 font-bold m-2  text-green-500">Update service</h1>
<hr>
    <form class="w-75 mx-auto"  method="post" action="{{route('vet.service.update',$service->id)}}" enctype="multipart/form-data">
      @csrf
      @method('put')
	<div class="form-group">
		<label>Enter Name</label>
		<input type="text" name="name" class="form-control" value="{{$service->name}}" required>
	</div>

  <div class="form-group">
    <label>Select Location</label>
    <select name="location" class="form-control" required>

<option @if($service->location=="Meru") {{"selected"}} @endif>Meru</option>
<option @if($service->location=="Maua") {{"selected"}} @endif>Maua</option>
<option @if($service->location=="Makutano") {{"selected"}} @endif>Makutano</option>
      <select>
  </div>

		<div class="form-group">
		<label>Enter Description</label>
		<textarea name="details" class="form-control" rows="3" required>{{$service->details}} </textarea>

	</div>

			<div class="form-group">
		<label>upload file</label>
		<input type="file" name="image" class="form-control">

	</div>

  <div class="form-group">
    <button type="submit" class="btn btn-primary">Update</button>
</div>




</form>

  </div>
@endsection

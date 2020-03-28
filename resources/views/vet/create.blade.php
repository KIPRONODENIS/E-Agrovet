@extends('layouts.app')
@section('body')
@component('components.navbarComponent')

@endcomponent

<div class="jumbotron h-screen">
  <div class="shadow w-3/4 mx-auto p-1">
 
@include('partials.vetNav')
  </div>

  <div class="shadow w-3/4 mx-auto p-1">
<h1 class="h3 font-bold m-2  text-green-500">Create service</h1>
    <form class="w-75 mx-auto"  method="post" action="{{route('vet.service.store')}}" enctype="multipart/form-data">
      @csrf
	<div class="form-group">
		<label>Enter Name</label>
		<input type="text" name="name" class="form-control" value="{{old('name')}}">
	</div>

  <div class="form-group">
    <label>Select Location</label>
    <select name="location" class="form-control">
<option value="" selected disabled>Select location</option>
<option>Meru</option>
<option>Maua</option>
<option>Makutano</option>
      <select>
  </div>

		<div class="form-group">
		<label>Enter Description</label>
		<textarea name="details" class="form-control" rows="3">{{old('details')}} </textarea>

	</div>

			<div class="form-group">
		<label>upload file</label>
		<input type="file" name="image" class="form-control">

	</div>

  <div class="form-group">
    <button type="submit" class="btn btn-primary">Create</button>
</div>




</form>

  </div>
@endsection

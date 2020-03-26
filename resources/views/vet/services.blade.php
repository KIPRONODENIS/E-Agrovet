@extends('layouts.app')
@section('body')
@component('components.navbarComponent')

@endcomponent

<div class="jumbotron h-screen">
  <div class="shadow w-3/4 mx-auto p-1">
  <ul class="nav nav-pills my-3 col-md-8 mx-auto">
    	<li class="nav-item "><a href="{{route('home')}}" class="nav-link ">Home</a></li>
    	<li class="nav-item"><a href="{{route('vet.services')}}" class="nav-link  active">  Services</a></li>
    	<li class="nav-item"><a href="{{route('vet.profile')}}" class="nav-link">Profile</a></li>
    </ul>
  </div>

  <div class="shadow w-3/4 mx-auto p-1">
    <h1 class="h1 shadow font-bold my-2">Services <a class="btn btn-success float-right" href="{{route('vet.service.create')}}">New Service</a></h1>
        <table class="table ">
      	<thead class="table-dark">
      		<tr>
      			<th>#</th>
      			<th>Name</th>
      			<th>Details</th>
      			<th>Image</th>
      			<th>Location</th>
      			<th>Action</th>
      		</tr>
      	</thead>
    <tbody>
      @foreach($services as $service)
      <tr>
        <td>{{$loop->index+1}}</td>
        <td>{{$service->name}}</td>
        <td>{{$service->details}}</td>
        <td><img src="{{asset('storage/'.$service->image)}}" height="100" width="100"></td>
        <td>{{$service->location}}</td>
        <td class="flex justify-around">
          <a href="{{route('vet.service.edit',$service->id)}}" class="btn btn-primary text-white">Edit</a>
          <a href="{{route('vet.service.delete',$service->id)}}" class="btn btn-danger text-white" >Delete</a>

        </td>
      </tr>
@endforeach
     </tbody>
      </table>

  </div>
</div>
@endsection

@extends('layouts.app')
@section('body')
@component('components.navbarComponent')

@endcomponent

<div class="jumbotron h-screen">
  <div class="shadow w-3/4 mx-auto p-1">
    @include('partials.subscribe')
 
@include('partials.vetNav')
  </div>

  <div class="shadow w-3/4 mx-auto p-1">
    <h1 class="h1 shadow font-bold my-2">Services
            @if(!Auth::user()->subscriptions->count()==0)
     <a class="btn btn-success float-right" href="{{route('vet.service.create')}}">New Service</a>
     @endif

   </h1>
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

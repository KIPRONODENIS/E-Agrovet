@extends('layouts.admin')
@section('content')

<div class="card p-2 m-2 h4"> Name: <i class="text-gray-500 my-2">{{$provider->name}}</i></div>

<div class="card p-2 m-2 h4"> Email: <i class="text-gray-500 my-2">{{$provider->name}}</i></div>
<div class="card p-2 m-2 h4"> <span >Services: </span><i>
	<ul>
		@foreach($provider->services as $service)
          <li class="text-gray-500 my-2">{{$service->name}}</li>
		@endforeach
	</ul>
</i></div>

<div class="card p-2 m-2 h4"> Member since: <i class="text-gray-500 my-2">{{$provider->created_at->diffForHumans()}}</i></div>
@endsection

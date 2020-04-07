@extends('layouts.admin')
@section('content')
<div class="m-2">
		<table class="table table-responsive bg-white w-3/4 mx-auto">

		<tr class="font-bold">
			<td>#</td>
			<td>Image</td>
			<td>Name</td>
           <td>Location</td>
           <td>Provider</td>
           <td>Details</td>
		   <td>Date Created</td>
		   <td>Action</td>
		</tr>

		@foreach($services as $service)

		<tr>
			<td>{{$loop->index+1}}</td>
			<td><img src="{{asset('storage/'.$service->image)}}"></td>
			<td>{{$service->name}}</td>
			<td>{{$service->location}}</td>
			<td>{{$service->user->name}}</td>
			<td>{{$service->details}}</td>

			<td>{{$service->created_at->diffForHumans()}}</td>
					    <td class="flex justify-around">

		<!-- 			<a href=""><span class="fa fa-eye text-success"></span></a> -->
					<a href="{{route('admin.service.edit',$service->id)}}"><span class="fa fa-edit text-primary"></span><a>
			
					<a href="{{route('admin.service.destroy',$service->id)}}"><span class="fa fa-trash text-danger"></span></a>
				</td>
		</tr>

		@endforeach

</table> 
</div>
@endsection
@extends('layouts.admin')
@section('content')

<div class="m-2">
		<table class="table table-responsive bg-white w-3/4 mx-auto">

		<tr class="font-bold">
			<td>#</td>
			<td>Name</td>
           <td>email</td>
           <td>Services</td>
		   <td>Date Created</td>
		   <td>Action</td>
		</tr>

		@foreach($providers as $provider)

		<tr>
			<td>{{$loop->index+1}}</td>
			<td>{{$provider->name}}</td>
			<td>{{$provider->email}}</td>
			<td>
				{{$provider->services->count()}}


			</td>

			<td>{{$provider->created_at->diffForHumans()}}</td>
					    <td class="flex justify-around">

					<a href="{{route('admin.provider.view',$provider->id)}}"><span class="fa fa-eye text-success"></span></a>
					<!-- <a ><span class="fa fa-edit text-primary"></span></a>
			 -->
					<a href="{{route('admin.provider.delete',$provider->id)}}"><span class="fa fa-trash text-danger"></span></a>
				</td>
		</tr>

		@endforeach

</table> 
</div>
@endsection
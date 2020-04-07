@extends('layouts.admin')
@section('content')

<div class="m-2">
		<table class="table table-responsive bg-white w-3/4 mx-auto">

		<tr class="font-bold">
			<td>#</td>
			<td>Name</td>
           <td>email</td>
       
		   <td>Date Created</td>
		   <td>Action</td>

		</tr>

		@foreach($customers as $customer)

		<tr>
			<td>{{$loop->index+1}}</td>
			<td>{{$customer->name}}</td>
			<td>{{$customer->email}}</td>
		

			<td>{{$customer->created_at->diffForHumans()}}</td>
		<td class="flex justify-around">
					<a href="{{route('admin.user.show',$customer->id)}}"><span class="fa fa-eye text-success"></span></a>
			



					<a href="{{route('admin.users.destroy',$customer->id)}}" ><span class="fa fa-trash text-danger"></span></a>
				</td>
		</tr>

		@endforeach

</table> 
</div>

@endsection
@extends('layouts.admin')
@section('content')

<div class="m-2">
		<table class="table table-responsive bg-white">
		<tr>
			<th>#</th>
			<th>Deducted From</th>
			<th>Amount</th>
			<th>Description</th>
			<th>Date</th>
			<th>Action</th>
		</tr>

		@if($revenues->count()>0)
       @foreach($revenues as $item)
		<tr>
			<td>{{$loop->index+1}}</td>
			<td>{{$item->user->name }}</td>
			<td>{{$item->amount}}</td>
			<td>{{$item->description}}</td>
			<td>{{$item->created_at->diffForHumans()}}</td>
					    <td class="flex justify-around">

				<!-- 	<a href=""><span class="fa fa-eye text-success"></span></a>
					<a ><span class="fa fa-edit text-primary"></span><a> -->
			
					<a href="{{route('revenue.destroy',$item->id)}}" ><span class="fa fa-trash text-danger"></span></a>
				</td>
		</tr>
       @endforeach
		@endif
	</table>
</div>
@endsection
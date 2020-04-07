@extends('layouts.admin')
@section('content')

<div class="m-2">
		<table class="table table-responsive bg-white w-3/4 mx-auto">

		<tr class="font-bold">
			<td>#</td>
			<td>Agrovet</td>
           <td>Amount</td>
       
		   <td>Date Created</td>
		   <td>Action</td>
		</tr>

		@foreach($withdrawals as $withdraw)

		<tr>
			<td>{{$loop->index+1}}</td>
			<td>{{$withdraw->agrovet->name}}</td>
			<td>{{$withdraw->amount}}</td>
		

			<td>{{$withdraw->created_at->diffForHumans()}}</td>
					    <td class="flex justify-around">

			
					<a href="{{route('withdraw.destroy',$withdraw->id)}}"><span class="fa fa-trash text-danger"></span></a>
				</td>
		</tr>

		@endforeach

</table> 
</div>
@endsection
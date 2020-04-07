@extends('layouts.admin')
@section('content')
<div class="m-2">
		<table class="table table-responsive bg-white w-3/4 mx-auto">

		<tr class="font-bold">
			<td>#</td>
			<td>Phone</td>
           <td>Total</td>
           <td>Items</td>
           <td>Status</td>
           <td>Station</td>
       <td>Date Created</td>
       <td>Action</td>
		</tr>

		@foreach($orders as $order)

		<tr>
			<td>{{$loop->index+1}}</td>
			<td>{{$order->phone}}</td>
			<td>{{$order->total}}</td>
			<td>{{$order->items}}</td>
			<td>{{$order->status}}</td>
			<td>{{$order->station->name}}</td>
		

			<td>{{$order->created_at->diffForHumans()}}</td>
					    <td class="flex justify-around">

					
					<a class="btn btn-primary text-white" data-toggle="modal" data-toggle="modal" data-target="#edit_name"><span class="fa fa-edit text-white"></span>Status<a>
			
					
<!-- Modal -->
<div class="modal fade" id="edit_name" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title  py-2 font-bold text-black text-center text-md  tracking-widest uppercase" id="exampleModalLabel">Update Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <div class="bg-white rounded shadow w-2/3 mx-auto">


                <form class="bg-grey-lightest px-10 py-10" method="post" action="{{route('order.update.status',$order->id)}}">
                    {{ csrf_field() }}
                      @method('put')
                    <div class="mb-3">
                      <label>Update Status.</label>
                        <select class="border w-full p-3" name="status" type="text"  value="" required>
                        	<option>Pending</option>
                        	<option>shipped</option>
                        	<option>Delivered</option>
                        </select>
                        @error('name')
                    <p class="text-red-500">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="flex">
                        <button type="submit" class="bg-blue-700 hover:bg-teal-800 w-full p-4 text-sm text-white uppercase font-bold tracking-wider">
                          Update
                        </button>
                    </div>
                </form>

            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>


				</td>
		</tr>

		@endforeach

</table> 
</div>
@endsection
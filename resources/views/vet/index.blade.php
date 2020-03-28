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
<h1 class="h3 shadow text-teal-500 p-2 font-bold">Recieved Request</h1>
          <table class="table mt-5">
        	<thead class="table-dark">
        		<tr>
        			<th>#</th>
        			<th>Customer</th>
        			<th>Service name</th>
        			<th>Description</th>
        			<th>phone</th>
        			<th>location</th>
        			<th>status</th>
              <th>Update Status</th>
        		</tr>
        	</thead>
      <tbody>
        @foreach($orders as $order)
        <tr>
        <td>{{$loop->index+1}}</td>
        <td>{{$order->owner->name}}</td>
        <td>{{$order->service->name}}</td>
        <td>{{$order->description}}</td>
        <td>{{$order->phone}}</td>
        <td>{{$order->location}}</td>
        <td>{{$order->status ?? "pending"}}</td>
        <td><a href="#" class="btn btn-primary text-white" data-toggle="modal" data-target="#status{{$order->id}}">Update </a></td>
</tr>    <!-- //create form -->
    <div id="status{{$order->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <form  method="post" action="{{route('vet.order.update',$order->id)}}">
            @csrf
          <div class="modal-header">
              <h4 class="modal-title">Update Status</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
     <select name="status" class="form-control">
<option>Pending</option>
<option>Accepted</option>
<option>Rejected</option>
     </select>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" >Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </form>
        </div>

      </div>
    </div>
        @endforeach

       </tbody>
        </table>

    </div>
</div>
@endsection

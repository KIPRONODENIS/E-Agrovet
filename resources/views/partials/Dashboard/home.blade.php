<div class=" col-12 tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
  <div class="w-full">
         <div class="table-wrapper w-full">
             <div class="card">
                 <div class="row">
                     <div class="col-sm-4">
 						<h2 class="h3 m-2">Order <b>Details</b></h2>
 					</div>
 					<div class="col-sm-8">
 						<a href="#" class="btn btn-primary"><i class="fa fa-print">

</i> Print</a>

                 </div>
             </div>

             <table class="table table-striped table-hover w-100">
                 <thead>
                     <tr>
                         <th>#</th>
                         <th>orderID</th>
 						<th>Pickup Location</th>
 						<th>Order Date</th>
                         <th>Status</th>
 						<th>Net Amount</th>
 						<th>Action</th>
                     </tr>
                 </thead>
                 <tbody>
@if($orders->count()>0)
@foreach($orders as $order)
                     <tr>
                       <td> {{$loop->index+1}}</td>
                         <td>{{$order->id}}</td>

 						<td>{{$order->station->name}}</td>
                         <td>{{$order->created_at->diffForHumans()}}</td>
 						<td><span class="status text-success">&bull;</span> {{$order->status}}</td>
 						<td>{{$order->total}}</td>
 						<td><a href="{{route('order.show',$order->id)}}" class="view" title="View Details" data-toggle="tooltip"><i class="fa fa-arrow-right"></i></a></td>
                     </tr>
@endforeach
@else
<tr>
<td colspan="6">You have no orders</td>
</tr>
@endif

                 </tbody>
             </table>

         </div>
     </div>


     <div class="w-full">
            <div class="table-wrapper w-full">
                <div class="card">
                    <div class="row">
                        <div class="col-sm-4">
                <h2 class="h3 m-2">Sent Service Request  <b></b></h2>
              </div>
              <div class="col-sm-8">
                <a href="#" class="btn btn-primary"><i class="fa fa-print">

</i> Print</a>

              </div>
                    </div>
                </div>

                <table class="table table-striped table-hover w-100 bg-green-200">
                    <thead>
                        <tr>
                <th>#</th>
                <th>Service</th>
                <th>Description</th>
                <th>Provider</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Date</th>

                        </tr>
                    </thead>
                    <tbody>
   @if($service_orders->count()>0)
   @foreach($service_orders as $service_order)
   <tr>
   <td>{{$loop->index+1}}</td>
   <td>{{$service_order->service->name}}</td>
   <td>{{$service_order->description}}</td>
   <td>{{$service_order->owner->name}}</td>
   <td>{{$service_order->phone}}</td>
   <td>{{$service_order->status}}</td>
   <td>{{$service_order->created_at->diffForHumans()}}</td>
</tr>
   @endforeach
   @else
   <tr>
   <td colspan="7">You have no orders</td>
   </tr>
   @endif

                    </tbody>
                </table>

            </div>
        </div>
</div>

@extends('layouts.app')
@section('body')
@component('components.navbarComponent')

@endcomponent
<div class=" h-screen bg-green-200 col-md-8 mx-auto">
	@include('partials.agrovetNav')
@if(!Auth::user()->agrovet==null)
	<div class="col-md-10 flex my-3 justify-around  w-full  mx-auto">
		<div class="col-3 card p-2 text-center shadow-sm">
			<h4>Account Balance</h4>
           <h4  class="h3 font-bold">Ksh. {{Auth::user()->agrovet->balance() ?? 0}}</h4>
		</div>
			<div class="col-3 card p-2 text-center shadow-sm">
			<h4>Total Earnings</h4>
           <h4  class="h3 font-bold">Ksh. {{Auth::user()->agrovet->total() ?? 0}}</h4>
		</div>
				<div class="col-3 card p-2 text-center shadow-sm">
			<h4>Amount Withdrawn</h4>
           <h4  class="h3 font-bold">Ksh. {{Auth::user()->agrovet->withdraws() ?? 0}}</h4>
		</div>
						<div class="col-3 card p-2 text-center shadow-sm">
			<a class="btn btn-success text-white p-2 m-2" data-toggle="modal" data-target="#Withdraw"> Withdraw</a >

		</div>
	</div>


<!-- Modal -->
<div class="modal fade" id="Withdraw" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title  py-2 font-bold text-black text-center text-xl tracking-widest uppercase" id="exampleModalLabel">Withdraw</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <div class="bg-white rounded shadow w-2/3 mx-auto">
                <div class="border-b py-8 font-bold text-black text-center text-xl tracking-widest uppercase">
                   Withdraw Cash
                </div>

                <form class="bg-grey-lightest px-10 py-10" method="post" action="{{route('account.withdraw')}}">
                    {{ csrf_field() }}

                    <div class="mb-3">
                    	<label>Enter Phone No.</label>
                        <input class="border w-full p-3" name="phone" type="phone" placeholder="Phone" pattern='^0\d{9}'>
                        @error('phone')
                    <p class="text-red-500">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                    	<label>Enter Amount No.</label>
                        <input class="border w-full p-3" name="amount" type="number" placeholder=" e.g 100" min="100" max="{{Auth::user()->agrovet->balance()}}">
                           @error('amount')
                    <p class="text-red-500">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="flex">
                        <button type="submit" class="bg-blue-700 hover:bg-teal-800 w-full p-4 text-sm text-white uppercase font-bold tracking-wider">
                           Withdraw
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

  <hr>
  <div class="mx-auto mt-4 ">
<div class="bg-white rounded shadow w-3/4 mx-auto">
	  <h5 class="modal-title  py-2 font-bold text-black text-center text-xl tracking-widest uppercase" id="exampleModalLabel">Withdrawals</h5>
<table class="table table-responsive bg-white">
	<thead>
	<tr>
		<td class="font-bold">#</td>
		<td class="font-bold">Amount</td>
		<td class="font-bold">Date</td>
	</tr>
</thead>
<tbody>
	@foreach(Auth::user()->agrovet->withdrawals as $withdrawal)
	<tr>
		<td>{{$loop->index+1}}</td>
		<td>{{$withdrawal->amount}}</td>
		<td>{{$withdrawal->created_at->diffForHumans()}}</td>
	</tr>
	@endforeach
</tbody>
</table>
         
  </div>
  </div>
  @else
  <div class="alert alert-info">You have no data Yet</div>
@endif
 

</div>
@endsection
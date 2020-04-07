@extends('layouts.admin')
@section('content')

<div class="  flex flex-wrap px-2 bg-green-200" style="min-height: 550px !important">



			<div class=" mx-2 card bg-white shadow h-50 m-2 p-2 col-3">
		<h4 class="text-success h3 p-2"><i class="fa fa-hotel"></i>Revenue</h4>
		<h1 class="h3 p-2">{{$revenue}}</h1>
	</div>
		<div class=" mx-2 card bg-white shadow h-50 m-2 p-2 col-3">
		<h4 class="text-success h3 p-2"><i class="fa fa-hotel"></i>Agrovets</h4>
		<h1 class="h3 p-2">{{$agrovets}}</h1>
	</div>
			<div class=" mx-2 card bg-white shadow h-50 m-2 p-2 col-3">
		<h4 class="text-success h3 p-2">Service Providers</h4>
		<h1 class="h3 p-2">{{$providers}}</h1>
	</div>

			<div class=" mx-2 card bg-white shadow h-50 m-2 p-2 col-3">
		<h4 class="text-success h3 p-2"><i class="fa fa-hotel"></i>Payments</h4>
		<h1 class="h3 p-2">{{$payments}}</h1>
	</div>
		<div class=" mx-2 card bg-white shadow h-50 m-2 p-2 col-3">
		<h4 class="text-success h3 p-2"><i class="fa fa-hotel"></i>Services</h4>
		<h1 class="h3 p-2">{{$services}}</h1>
	</div>
			<div class=" mx-2 card bg-white shadow h-50 m-2 p-2 col-3">
		<h4 class="text-success h3 p-2">Orders</h4>
		<h1 class="h3 p-2">{{$orders}}</h1>
	</div>
				<div class=" mx-2 card bg-white shadow h-50 m-2 p-2 col-3">
		<h4 class="text-success h3 p-2">Customers</h4>
		<h1 class="h3 p-2">{{$customers}}</h1>
	</div>
					<div class=" mx-2 card bg-white shadow h-50 m-2 p-2 col-3">
		<h4 class="text-success h3 p-2">Withdrawals</h4>
		<h1 class="h3 p-2">{{$withdrawals}}</h1>
	</div>
						<div class=" mx-2 card bg-white shadow h-50 m-2 p-2 col-3">
		<h4 class="text-success h3 p-2">Pickup Points</h4>
		<h1 class="h3 p-2">{{$stations}}</h1>
	</div>

</div>
@endsection
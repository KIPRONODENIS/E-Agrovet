<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    	<div class="bg-white p-2 m-2 ">
    		<div class="flex justify-end">
    			
		<select class="form-control w-1/4 " wire:model="time">
			<option value="1">Last One Week</option>
			<option value="2">Last One Month</option>
			<option value="3">Last 6 Months</option>
			<option value="4">Last One Year</option>
		</select>
</div>
		<table class="table table-responsive bg-white w-full mx-auto mt-2">

		<tr class="font-bold">
			<td>#</td>
			<td>New Users</td>
           <td>Revenue</td>
           <td>Services</td>
		   <td>Orders</td>
		   <td>Agrovets</td>
		</tr>

		

		<tr>
			<td>#</td>
			<td>{{$users}}</td>
           <td>{{$revenue}}</td>
           <td>{{$services}}</td>
		   <td>{{$orders}}</td>
		   <td>{{$agrovets}}</td>
		</tr>


</table> 
	</div>
    		
</div>

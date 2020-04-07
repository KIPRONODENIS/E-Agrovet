@extends('layouts.admin')
@section('content')

<div class="m-2">
		<table class="table table-responsive bg-white w-1/2 mx-auto">

		<tr>
			<td>#</td>
			<td>Name</td>
			<td>Product</td>

			<td>Date Created</td>
			<td>Action</td>
		</tr>

		@foreach($agrovets as $agrovet)

		<tr>
			<td>{{$loop->index+1}}</td>
			<td>{{$agrovet->name}}</td>
             <td>{{$agrovet->user->products->count()}}</td>
			<td>{{$agrovet->created_at->diffForHumans()}}</td>
		    <td class="flex justify-around">

					<a href="{{route('admin.agrovet.view',$agrovet->id)}}"><span class="fa fa-eye text-success"></span></a>
					<a data-toggle="modal" data-toggle="modal" data-target="#edit{{$agrovet->id}}"><span class="fa fa-edit text-primary"></span><a>
			
					<a href="{{route('admin.agrovet.destroy',$agrovet->id)}}"><span class="fa fa-trash text-danger"></span></a>

<!-- Modal -->
<div class="modal fade" id="edit{{$agrovet->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title  py-2 font-bold text-black text-center text-md  tracking-widest uppercase" id="exampleModalLabel">EDIT NAME</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <div class="bg-white rounded shadow w-2/3 mx-auto">


                <form class="bg-grey-lightest px-10 py-10" method="post" action="{{route('admin.agrovet.edit',$agrovet->id)}}">
                    {{ csrf_field() }}
                      @method('put')
                    <div class="mb-3">
                      <label>Edit Name.</label>
                        <input class="border w-full p-3" name="name" type="text"  value="{{$agrovet->name}}" required>
                        @error('name')
                    <p class="text-red-500">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="flex">
                        <button type="submit" class="bg-green-700 hover:bg-teal-800 w-full p-4 text-sm text-white uppercase font-bold tracking-wider">
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
@extends('layouts.admin')
@section('content')
<div class="card col-md-10 mx-auto mt-3">
  <table class="table">
   <tr>
     <td><p class="h4 font-bold">Name:</p></td>
      <td><p class="text-md text-green-400 font-bold">{{$user->name}}</p></td>
      <td><!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_name">
Edit
</button>
<form class="modal fade" id="edit_name" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" method="post" action="{{route('profile.update.name')}}">
  @csrf
  @method('put')

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Name</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
             <div class="md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
      EDIT YOUR NAME:*
        </label>
        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" name="name" type="text" value="{{$user->name}}" required >
        @error('name')
      <span class="text-red-700">  {{$message}}<span>

        @enderror
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</form>

</td>
   </tr>

   <tr>
     <td><p class="h4 font-bold">Email:<p></td>
      <td><p class="text-md text-green-400 font-bold">{{$user->email}}</p></td>
      <td><!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_email">
Edit
</button>
<form class="modal fade" id="edit_email" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" action="{{route('profile.email.update')}}" method="post"> 
  @csrf 
  @method('put')
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
             <div class="md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
        YOUR EMAIL :*
        </label>
        <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="grid-first-name" name="email" type="email" value="
        {{$user->email}}" required>
        @error('email')
      <span class="text-red-700">  {{$message}}<span>

        @enderror
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</form>

</td>
   </tr>
      <tr>
     <td><p class="h4 font-bold">Orders:</p></td>
      <td><p class="text-md text-green-400 font-bold">{{$user->orders->count()}}</p></td>
    </tr>
          <tr>
     <td><p class="h4 font-bold">Service Orders:</p></td>
      <td><p class="text-md text-green-400 font-bold">{{$user->vetOrders->count()}}</p></td>
    </tr>
  </table>
</div>
@endsection
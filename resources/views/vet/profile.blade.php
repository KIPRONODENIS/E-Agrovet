
@extends('layouts.app')
@section('body')
@component('components.navbarComponent')

@endcomponent
<div class="h-screen">
<div class="nav my-2  bg-green-200 w-full col-md-10 mx-auto">
  <ul class="nav nav-pills my-3 col-md-8 mx-auto">
    <li class="nav-item "><a href="{{route('home')}}" class="nav-link  ">Home</a></li>
    <li class="nav-item"><a href="{{route('vet.services')}}" class="nav-link ">  Services</a></li>
  <li class="nav-item"><a href="{{route('vet.profile')}}" class="nav-link active">Profile</a></li>
    </ul>



</div>

<div class="card col-md-10 mx-auto ">
  <table class="table">
   <tr>
     <td><p class="h4 font-bold">Name:<p></td>
      <td><p class="text-md text-green-400 font-bold">{{Auth::user()->name}}</p></td>
      <td><!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_name">
Edit
</button>
<div class="modal fade" id="edit_name" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Name</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

</td>
   </tr>

   <tr>
     <td><p class="h4 font-bold">Email:<p></td>
      <td><p class="text-md text-green-400 font-bold">{{Auth::user()->email}}</p></td>
      <td><!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_email">
Edit
</button>
<div class="modal fade" id="edit_email" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

</td>
   </tr>
  </table>
</div>
</div>
@endsection

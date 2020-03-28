
@extends('layouts.app')
@section('body')
@component('components.navbarComponent')

@endcomponent
<div class="h-screen">
@include('partials.agrovetNav')
<div class="card col-md-10 mx-auto ">
  <table class="table">
   <tr>
     <td><p class="h4 font-bold">Name:<p></td>
      <td><p class="text-md text-green-400 font-bold">{{Auth::user()->name}}</p></td>
      <td><!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_name">
Edit
</button>


<!-- Modal -->
<div class="modal fade" id="edit_name" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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


                <form class="bg-grey-lightest px-10 py-10" method="post" action="{{route('profile.update.name')}}">
                    {{ csrf_field() }}
                      @method('put')
                    <div class="mb-3">
                      <label>Edit Name.</label>
                        <input class="border w-full p-3" name="name" type="text"  value="{{Auth::user()->name}}" required>
                        @error('name')
                    <p class="text-red-500">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="flex">
                        <button type="submit" class="bg-blue-700 hover:bg-teal-800 w-full p-4 text-sm text-white uppercase font-bold tracking-wider">
                           Edit
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

   <tr>
     <td><p class="h4 font-bold">Email:<p></td>
      <td><p class="text-md text-green-400 font-bold">{{Auth::user()->email}}</p></td>
      <td><!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_email">
Edit
</button>

<!-- Modal -->
<div class="modal fade" id="edit_email" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title  py-2 font-bold text-black text-center text-md  tracking-widest uppercase" id="exampleModalLabel">Edit Email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <div class="bg-white rounded shadow w-2/3 mx-auto">


                <form class="bg-grey-lightest px-10 py-10" method="post" action="{{route('profile.email.update')}}">
                    {{ csrf_field() }}
                    @method('put')

                    <div class="mb-3">
                      <label>Edit Email.</label>
                        <input class="border w-full p-3" name="email" type="text"  value="{{Auth::user()->email}}" required>
                        @error('email')
                    <p class="text-red-500">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="flex">
                        <button type="submit" class="bg-blue-700 hover:bg-teal-800 w-full p-4 text-sm text-white uppercase font-bold tracking-wider">
                           Edit
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
  </table>
</div>

</div>
@endsection

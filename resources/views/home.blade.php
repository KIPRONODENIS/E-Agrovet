@extends('layouts.app')

@section('body')
@component('components.navbarComponent')

@endcomponent
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">


                <div class="card-body">

                    <div class="container">
                 <div class="row">
                   <div class=" col-12 col-xs-12 ">
                     <ul class="nav nav-pills my-3 col-md-8 mx-auto">
                         <li class="nav-item "><a href="{{route('home')}}" class="nav-link  active">Home</a></li>
                         <li class="nav-item"><a href="{{route('user.profile')}}" class="nav-link">  profile</a></li>


                       </ul>



                     <div class=" w-full" id="nav-tabContent">
  @include('partials.Dashboard.home')



                     </div>

                   </div>
                 </div>
           </div>
         </div>
   </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

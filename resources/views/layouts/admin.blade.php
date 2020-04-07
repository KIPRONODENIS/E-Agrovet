@extends('layouts.app')
@section('assets')
 
  <link href="{{asset('css/simple-sidebar.css')}}" rel="stylesheet">
@endsection

@section('body')

  <div class="d-flex w-100 " id="wrapper" style="min-height: 100vh !important">
@php $active="" @endphp
    <!-- Sidebar -->
    <div class="bg-grey-500 border-right" id="sidebar-wrapper mt-4">
  @php  $active=session('active') ?? 'dashboard' @endphp
      <div class="list-group list-group-flush ">
        <a  class="list-group-item bg-green-500  h-10 uppercase text-white">Admin</a>
        <a href="{{route('admin.home')}}" class="list-group-item list-group-item-action  {{$active=='dashboard' ? 'bg-blue-500 text-white':''}}">Dashboard </a>
        <a href="{{route('admin.revenue')}}" class=" list-group-item list-group-item-action {{$active=='revenue' ? 'bg-blue-500 text-white':''}} ">Revenue</a>
         <a href="{{route('admin.agrovets')}}" class="list-group-item list-group-item-action  {{$active=='agrovets' ? 'bg-blue-500 text-white':''}}">Agrovets</a>
         <a href="{{route('admin.providers')}}" class="list-group-item list-group-item-action  {{$active=='providers' ? 'bg-blue-500 text-white':''}}">Service Providers</a>
<!--         <a href="{{route('admin.payments')}}" class="list-group-item list-group-item-action {{$active=='payments' ? 'bg-blue-500 text-white':''}}">Payments</a> -->
        <a href="{{route('admin.services')}}" class="list-group-item list-group-item-action  {{$active=='services' ? 'bg-blue-500 text-white':''}}">Services</a>

         <a href="{{route('admin.orders')}}" class="list-group-item list-group-item-action  {{$active=='orders' ? 'bg-blue-500 text-white':''}}">Orders</a>

         <a href="{{route('admin.customers')}}" class="list-group-item list-group-item-action  {{$active=='customers' ? 'bg-blue-500 text-white':''}}">Customer</a>

         <a href="{{route('admin.withdrawals')}}" class="list-group-item list-group-item-action  {{$active=='withdrawals' ? 'bg-blue-500 text-white':''}}">Withdrawals</a>
           <!--   <a href="#" class="list-group-item list-group-item-action  {{$active=='revenues' ? 'active':''}}">Revenue</a> -->

           <a href="{{route('admin.report')}}" class="list-group-item list-group-item-action  {{$active=='report' ? 'bg-blue-500 text-white':''}}">Report </a>
       
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper w-100" style="width: 100% !important">

      <nav class="navbar navbar-expand-lg navbar-light alert-success border-bottom h-10 ">
      
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
            </li>
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name ?? "h"}} <span class="caret"></span>
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>

                          <a class="dropdown-item" href="/profile">Profile</a>
                      </div>
                  </li>
          </ul>
        </div>
      </nav>


@yield('content')


    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}" ></script>
    @include('sweetalert::alert')
    @livewireAssets
  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>


@endsection
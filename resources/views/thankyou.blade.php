@extends('layouts.app')
@section('body')
<div class="bg-green-100 h-screen">
@component('components.navbarComponent')

@endcomponent

<div class="card col-md-6 shadow p-3 mt-10 bg-green-200 mx-auto text-center">
  <h1 class="h1 text-grey-600 my-2">Thank you for your order</h1>
  <p>Your confirmation message has been sent<p>
    <a href="{{route('products.index')}}" class="btn shadow bg-yellow-500 text-md my-2 p-2">Continue shopping</a>
</div>
</div>
@endsection
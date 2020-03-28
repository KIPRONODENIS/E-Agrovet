@extends('layouts.app')

@section('body')
@component('components.navbarComponent')

@endcomponent
<div id="featured " class="my-4 mx-4 shadow-sm">
  <h1 class=" display-4 text-center py-2 text-yellow-500">All  Services</h1>
<div class=" text-left flex content-between flex-wrap mt-5 pt-2  justify-content-center">
 @foreach($services as $item)
 @component('components.service')
   @slot('image')
{{$item->image}}
   @endslot
   @slot('name')
{{$item->name}}
   @endslot
   @slot('id')
{{$item->id}}
   @endslot



	@slot('user')
{{$item->user->name}}
@endslot

 @endcomponent


@endforeach

  <div>
</div>

@endsection

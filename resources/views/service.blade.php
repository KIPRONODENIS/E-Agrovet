@extends('layouts.app')

@section('body')
@component('components.navbarComponent')

@endcomponent

<div class="container">
<div class="row h-screen">
<div class="col-6 d-block pt-6">
  <div class=" shadow-sm p-3">
 <img class="img-thumbnail" src="{{asset('/images/'.$service->image)}}">
 <h1 class="h1 py-2">{{$service->name}}</h1>
 <p class="lead">{{$service->details}}</p>

</div>

</div>
<div class="col-6 pt-5 mt-5">
  <form class="w-full max-w-lg" method="post" action="{{route('service.message')}}">
@csrf
<input type="hidden" name="id" value="{{$service->id}}">
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
          Phone No.
        </label>
        <input name="phone" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  type="text" pattern='^0\d{9}' required placeholder="eg 0799012907">
        @error('phone')
            <span class="text-red-700" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <p  class="text-gray-600 text-xs italic">Please fill your phone number</p>
      </div>
      <div class="w-full px-3">
        <label  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
        Location
        </label>
        <input name="location" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  type="text">
        @error('location')
            <span class="text-red-700" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <p class="text-gray-600 text-xs italic">Where are you located</p>
      </div>

    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
          Message
        </label>
        <textarea name="description" class=" no-resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none" id="message"></textarea>
        @error('description')
            <span class="text-red-700" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <p class="text-gray-600 text-xs italic">Brief description</p>
      </div>
    </div>
    <div class="md:flex md:items-center">
      <div class="md:w-2/3 d-flex">
        <button type="submit" class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
          Send
        </button>

      </div>
      <div class="md:w-2/3"></div>
    </div>
  </form>
</div>
</div>
</div>
@endsection

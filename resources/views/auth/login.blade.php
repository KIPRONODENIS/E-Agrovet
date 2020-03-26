@extends('layouts.app')

@section('body')
@component('components.navbarComponent')

@endcomponent
<form method="POST" action="{{ route('login') }}" class="h-screen mt-5">
    @csrf

<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col w-1/2 mx-auto mt-5">
    <div class="mb-4">
      <label class="block text-grey-darker text-sm font-bold mb-2" for="username">
      Email
      </label>
      <input id="email" type="email"
      class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker @error('email') is-invalid @enderror"  placeholder="example@gmail.com" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
      @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </div>

    <div class="mb-6">
      <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
        Password
      </label>
      <input name="password" required autocomplete="current-password"
       class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3  @error('password') is-invalid @enderror"

        id="password" type="password" placeholder="******************">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

      <p class="text-red text-xs italic">Please choose a password.</p>
    </div>

    <div class="flex items-center justify-between">
      <button type="submit" class="btn btn-primary hover:bg-blue-dark text-white font-bold py-2 px-4 rounded" type="submit">
      Login
      </button>


        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}

        @endif
    </a>
    </div>
</div>
</form>

@endsection

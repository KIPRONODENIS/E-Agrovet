@extends('layouts.app')
@section('content')

    <div class="h-2 bg-primary"></div>

    <div class="container mx-auto p-8 w-1/2 xs:w-full">


            <div class="bg-white rounded shadow">
                <div class="border-b py-8 font-bold text-black text-center text-xl tracking-widest uppercase">
                    Welcome back!
                </div>

                <form class="bg-grey-lightest px-10 py-10">
                    {{ csrf_field() }}

                    <div class="mb-3">
                        <input class="border w-full p-3" name="email" type="text" placeholder="E-Mail">
                    </div>
                    <div class="mb-6">
                        <input class="border w-full p-3" name="password" type="password" placeholder="**************">
                    </div>
                    <div class="flex">
                        <button class="bg-blue-700 hover:bg-teal-800 w-full p-4 text-sm text-white uppercase font-bold tracking-wider">
                            Login
                        </button>
                    </div>
                </form>

                <div class="border-t px-10 py-6">
                    <div class="flex justify-between">
                        <a href="{{route('register')}}" class="font-bold text-primary hover:text-primary-dark no-underline">Don't have an account?</a>
                        <a href="#" class="text-grey-darkest hover:text-black no-underline">Forgot Password?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

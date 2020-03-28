@extends('layouts.app')
@section('body')
@component('components.navbarComponent')

@endcomponent
@include('partials.vetNav')
@include('partials.Dashboard.home')

@endsection
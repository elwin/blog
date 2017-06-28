@extends('layouts.master')

@section('page')
    <div class="container blog-main">
        <div class="blog-about"> @include('partials.about') </div>
        @yield('content')
    </div>
@endsection
@extends('layouts.master')

@section('page')
    <div class="container blog-main">
        <div class="row">
            <div class="col-lg-3">
                <div class="blog-about"> @include('partials.about') </div>
            </div>
            <div class="col-lg-9">
                @yield('content')
            </div>
        </div>
    </div>
@endsection
@extends('layouts.twocolumn')

@section('content')
    @component('partials.alert')
        Hello {{ Auth::user()->name }}, you are successfully logged in!
    @endcomponent
@endsection

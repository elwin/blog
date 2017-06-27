@extends('layouts.twocolumn')

@section('title', 'Neuen Post erstellen')

@section('content')

<div class="card">
    <div class="card-header">Neues Post erstellen</div>
    <div class="card-block">
        {{ Form::open(['action' => 'PostController@store']) }}
        {{ Form::esText('title', 'Titel') }}
        {{ Form::esTextarea('excerpt', 'Auszug') }}
        {{ Form::esTextarea('body', 'Post') }}
        {{ Form::esSubmit() }}
        {{ Form::close() }}
    </div>
</div>

@endsection
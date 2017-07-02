@extends('layouts.master')

@section('title', 'Neuen Post erstellen')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Neues Post erstellen</div>
        <div class="card-block">
            @if (!isset($post))
                {{ Form::open(['route' => 'post.store']) }}
            @else
                {{ Form::model($post, ['route' => ['post.update', $post], 'method' => 'PUT']) }}
            @endif
            {{ Form::esText('title', 'Titel') }}
            {{ Form::esTextarea('excerpt', 'Auszug') }}
            {{ Form::esTextarea('body', 'Post') }}
            {{ Form::esSubmit() }}
            {{ Form::close() }}
        </div>
    </div>

    <script>
        new SimpleMDE({
            element: document.getElementById("body"),
            renderingConfig: {
                codeSyntaxHighlighting: true,
            }
        });
    </script>
</div>
@endsection
@extends('layouts.twocolumn')

@section('title', $post->title)

@section('content')

    <div class="blog-post">
        <h2 class="blog-post-title"><a href="{{ action('PostController@show', $post) }}">{{ $post->title }}</a></h2>
        <p class="blog-post-meta">{{ $post->created_at->diffForHumans() }}</p>
        <p class="blog-post-excerpt">
            {!! Markdown::convertToHtml($post->body) !!}
        </p>

        <a href="{{ route('post.edit', $post) }}" class="btn btn-outline-primary">Edit</a>
        {{ Form::open(['route' => ['post.destroy', $post], 'method' => 'DELETE', 'class' => 'form-button-inline']) }}
        {{ Form::submit('Delete', ['class' => 'btn btn-outline-danger']) }}
        {{ Form::close() }}
    </div>

    <script>
        hljs.initHighlightingOnLoad();
    </script>

@endsection
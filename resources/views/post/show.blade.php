@extends('layouts.master')

@section('title', $post->title)

@section('content')

    <div class="blog-post">
        <h2 class="blog-post-title"><a href="{{ action('PostController@show', $post) }}">{{ $post->title }}</a></h2>
        <p class="blog-post-meta">{{ $post->created_at->diffForHumans() }}</p>
        <p class="blog-post-excerpt">
            {{ $post->body }}
        </p>
    </div>

@endsection
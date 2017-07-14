@extends('layouts.master')

@section('content')
    <div class="canvas-wave-container">
        <canvas class="canvas-wave"></canvas>
    </div>

    <style>

        .canvas-wave-container {
            width: 100%;
            height: 400px;
        }

        .canvas-wave {
            background-color: gray;
        }
    </style>
@endsection
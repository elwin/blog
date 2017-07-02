@if ($message)
    <div class="top-alert top-alert-{{ $status }}">
        <div class="container">
            {!! $message !!}
        </div>
    </div>
@endif
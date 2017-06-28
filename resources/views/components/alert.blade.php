@if ($message)
    <div class="top-alert top-alert-{{ $status }}">
        {!! $message !!}
    </div>
@endif
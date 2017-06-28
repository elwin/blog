<div class="form-group row {{ $errors->has($name) ? 'has-danger' : '' }}">
    {{ Form::label($name, $label, ['class' => 'col-2 col-form-label']) }}
    <div class="col-10">
        {{ Form::textarea($name, null, ['class' => $errors->has($name) ? 'form-control form-control-danger' : 'form-control']) }}
        @if ($errors->has($name))
            <div class="form-control-feedback">{{ $errors->first($name) }}</div>
        @endif
    </div>
</div>
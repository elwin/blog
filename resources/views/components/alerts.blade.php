@include('components.alert', ['message' => session('danger'), 'status' => 'danger'])
@include('components.alert', ['message' => session('warning'), 'status' => 'warning'])
@include('components.alert', ['message' => session('info'), 'status' => 'info'])
@include('components.alert', ['message' => session('success'), 'status' => 'success'])
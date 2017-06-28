<html>
<head>
    <title>My Blog - @yield('title')</title>
    @include('partials.meta')
   </head>
<body>
{{-- @component('partials.alert')
    This is some important message!
@endcomponent --}}
@yield('page')

</body>
</html>
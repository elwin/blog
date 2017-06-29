<html>
<head>
    <title>My Blog - @yield('title')</title>
    @include('components.meta')
   </head>
<body>

@include('components.alerts')
@yield('page')
@include('components.footer')

</body>
</html>
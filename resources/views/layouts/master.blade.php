<html>
<head>
    <title>My Blog @yield('title')</title>
    @include ('components.meta')
   </head>
<body>

@include('components.alerts')
<div class="canvas-network-container">
    <canvas class="canvas-network"></canvas>
    <h1 class="canvas-title"><a href="/">Elwin Stephan</a></h1>
</div>

@yield('content')
@include('components.dependencies')

</body>
</html>
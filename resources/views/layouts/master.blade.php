<html>
<head>
    <title>My Blog - @yield('title')</title>
</head>
<body>

<link rel="stylesheet" href="/css/app.css">

<div class="container blog-main">

    <div class="row">
        <div class="col-md-4">
            @include('partials.about')
        </div>
        <div class="col-md-8">
            @yield('content')
        </div>
    </div>
</div>



</body>
</html>
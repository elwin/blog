<html>
<head>
    <title>My Blog - @yield('title')</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script>
</head>
<body>


<div class="container blog-main">

    <div class="row">
        <div class="col-lg-3">
            <div class="blog-about">
                @include('partials.about')
            </div>
        </div>
        <div class="col-lg-9">
            @yield('content')
        </div>
    </div>
</div>



</body>
</html>
<!DOCTYPE html>
<html>
<head>
    @include('layouts.head')
</head>
<body class="theme-red">
    @include('layouts.loader')
    <div class="overlay"></div>
    @include('layouts.search')
    @include('layouts.header')
    @include('layouts.side')
    <section class="content">
        <div class="container-fluid">
            @include('layouts.breadcrumb')
            @yield('content')
        </div>
    </section>
    @include('layouts.foot')
</body>
</html>
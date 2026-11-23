<!DOCTYPE html>
<html lang="en">

<head>
    @include('web._components.metas')
    @include('web._components.styles')
    @yield('page-styles')
    <link rel="icon" href="{{ asset('assets/images/RTCL.svg') }}?v=1">
    <title>@yield('title', 'Web')</title>
</head>

<body class="d-flex flex-column min-vh-100">
    @include('web._components.topbar')

    <div class="flex-fill d-flex flex-column">
        @yield('content')
    </div>

    @include('web._components.footer')
    @include('web._components.scripts')
    @yield('page-scripts')
</body>

</html>
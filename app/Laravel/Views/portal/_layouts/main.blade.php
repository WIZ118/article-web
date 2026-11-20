<!DOCTYPE html>
<html lang="en">

<head>
    @include('portal._components.metas')
    @include('portal._components.styles')
    @yield('page-styles')
    <link rel="icon" href="{{ asset('assets/images/RTCL.svg') }}?v=1">
    <title>@yield('title', 'RTCL Portal')</title>


</head>

<body>
    <div class="d-flex flex-column flex-md-row min-vh-100">
        @auth('user')
            @include('portal._components.sidebar')
        @endauth
        <div class="flex-fill d-flex flex-column">
            <div class="container flex-fill d-flex flex-column">
                <div class="row flex-fill">
                    <div class="col d-flex flex-column">
                        @yield('content')
                    </div>
                </div>
            </div>
            @include('portal._components.notifications')
            @include('portal._components.footer')
        </div>
    </div>
    @include('portal._components.scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggleBtn = document.getElementById('sidebar-toggle-btn');

            if (localStorage.getItem('rtcl_portal_sidebar_collapsed') === 'true') {
                document.body.classList.add('sidebar-collapsed');
            }

            if (toggleBtn) {
                toggleBtn.addEventListener('click', function () {
                    document.body.classList.toggle('sidebar-collapsed');
                    localStorage.setItem(
                        'rtcl_portal_sidebar_collapsed',
                        document.body.classList.contains('sidebar-collapsed')
                    );
                });
            }
        });
    </script>
    @yield('page-scripts')
</body>

</html>
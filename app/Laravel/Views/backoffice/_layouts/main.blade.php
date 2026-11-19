<!DOCTYPE html>
<html lang="en">
<head>
    @include('backoffice._components.metas')
    @include('backoffice._components.styles')
    @yield('page-styles')
</head>
<body>
    <div class="d-flex flex-column flex-md-row min-vh-100">
        @include('backoffice._components.sidebar')
        <div class="flex-fill d-flex flex-column">
            <div class="container flex-fill d-flex flex-column">
                <div class="row flex-fill">
                    <div class="col d-flex flex-column">
                        @yield('content')
                    </div>
                </div>
            </div>
            @include('backoffice._components.notifications')
            @include('backoffice._components.footer')
        </div>
    </div>
    @include('backoffice._components.scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggleBtn = document.getElementById('sidebar-toggle-btn');

            if (localStorage.getItem('rtcl_backoffice_sidebar_collapsed') === 'true') {
                document.body.classList.add('sidebar-collapsed');
            }

            if (toggleBtn) {
                toggleBtn.addEventListener('click', function () {
                    document.body.classList.toggle('sidebar-collapsed');
                    localStorage.setItem(
                        'rtcl_backoffice_sidebar_collapsed',
                        document.body.classList.contains('sidebar-collapsed')
                    );
                });
            }
        });
    </script>
    @yield('page-scripts')
</body>
</html>
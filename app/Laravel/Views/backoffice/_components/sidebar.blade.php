<nav id="portal-sidebar"
    class="navbar navbar-expand-md bg-white border-end shadow-sm align-items-md-start p-3 flex-md-column">
    <div class="container-fluid flex-md-column align-items-md-stretch p-0">

        <div class="d-flex justify-content-between align-items-center w-100 sidebar-header">
            <a href="{{ route('backoffice.dashboard') }}"
                class="d-flex align-items-center text-dark text-decoration-none px-1 overflow-hidden sidebar-brand">
                <img src="{{ asset('assets/images/RTCL.svg') }}" alt="Rtcl Logo" height="40" class="flex-shrink-0">
                <span class="fs-4 fw-bold ms-2 sidebar-text">Rtcl</span>
            </a>

            {{-- <button type="button" id="sidebar-toggle-btn"
                class="btn btn-light border btn-sm d-none d-md-inline-flex align-items-center justify-content-center flex-shrink-0"
                title="Toggle Sidebar" aria-label="Toggle Sidebar" style="width: 34px; height: 34px;">
                <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                </svg>
            </button> --}}

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#portal-sidebar-menu"
                aria-controls="portal-sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <hr class="text-secondary opacity-25 d-none d-md-block w-100 my-3">

        <div class="collapse navbar-collapse flex-md-column align-items-md-stretch w-100 mt-3 mt-md-0"
            id="portal-sidebar-menu">
            <ul class="nav nav-pills flex-column mb-auto gap-1 w-100">
                <li class="nav-item">
                    <a href="{{ route('backoffice.dashboard') }}" title="Dashboard"
                        class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('backoffice.dashboard') ? 'active fw-semibold' : 'text-dark' }}"
                        @if(request()->routeIs('backoffice.dashboard'))
                        style="background-color: #0d6efd; color: #ffffff !important;" @endif>
                        <svg class="flex-shrink-0" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M0 1.5A1.5 1.5 0 0 1 1.5 0h5A1.5 1.5 0 0 1 8 1.5v5A1.5 1.5 0 0 1 6.5 8h-5A1.5 1.5 0 0 1 0 6.5zM1.5 1a.5.5 0 0 0-.5.5v5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 .5-.5v-5a.5.5 0 0 0-.5-.5zm8 0A1.5 1.5 0 0 1 11 0h3.5A1.5 1.5 0 0 1 16 1.5v5A1.5 1.5 0 0 1 14.5 8H11A1.5 1.5 0 0 1 9.5 6.5zm1.5-.5a.5.5 0 0 0-.5.5v5a.5.5 0 0 0 .5.5h3.5a.5.5 0 0 0 .5-.5v-5a.5.5 0 0 0-.5-.5zM0 11A1.5 1.5 0 0 1 1.5 9.5h5A1.5 1.5 0 0 1 8 11v3.5A1.5 1.5 0 0 1 6.5 16h-5A1.5 1.5 0 0 1 0 14.5zm1.5-.5a.5.5 0 0 0-.5.5v3.5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 .5-.5V11a.5.5 0 0 0-.5-.5zm8 .5A1.5 1.5 0 0 1 11 9.5h3.5A1.5 1.5 0 0 1 16 11v3.5a1.5 1.5 0 0 1-1.5 1.5H11a1.5 1.5 0 0 1-1.5-1.5zm1.5-.5a.5.5 0 0 0-.5.5v3.5a.5.5 0 0 0 .5.5h3.5a.5.5 0 0 0 .5-.5V11a.5.5 0 0 0-.5-.5z" />
                        </svg>
                        <span class="sidebar-text">Dashboard</span>
                    </a>
                </li>

                <li class="nav-header text-uppercase text-muted fw-bold small mt-3 mb-1 px-3 sidebar-text"
                    style="font-size: 0.72rem; letter-spacing: 0.05em;">
                    Account Management
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('backoffice.admin_account_management.*') ? 'active fw-semibold' : 'text-dark' }}"
                        @if(request()->routeIs('backoffice.admin_account_management.*'))
                        style="background-color: #0d6efd; color: #ffffff !important;" @endif
                        href="{{ route('backoffice.admin_account_management.index') }}">Admin Accounts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('backoffice.user_account_management.*') ? 'active fw-semibold' : 'text-dark' }}"
                        @if(request()->routeIs('backoffice.user_account_management.*'))
                        style="background-color: #0d6efd; color: #ffffff !important;" @endif
                        href="{{ route('backoffice.user_account_management.index') }}">User Accounts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('backoffice.profile.*') ? 'active fw-semibold' : 'text-dark' }}"
                        @if(request()->routeIs('backoffice.profile.*'))
                        style="background-color: #0d6efd; color: #ffffff !important;" @endif
                        href="{{ route('backoffice.profile.show') }}">Profile</a>
                </li>

            </ul>

            <hr class="text-secondary opacity-25 w-100 my-3">

            <div class="w-100">
                <form action="{{ route('backoffice.logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" title="Sign Out"
                        class="btn btn-outline-danger btn-sm w-100 d-flex align-items-center justify-content-center gap-2">
                        <svg class="flex-shrink-0" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                            <path fill-rule="evenodd"
                                d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                        </svg>
                        <span class="sidebar-text">Sign Out</span>
                    </button>
                </form>
            </div>
        </div>

    </div>
</nav>
<nav id="portal-sidebar"
    class="navbar navbar-expand-md bg-white border-end shadow-sm align-items-md-start p-3 flex-md-column">
    <div class="container-fluid flex-md-column align-items-md-stretch p-0">

        <div class="d-flex justify-content-between align-items-center w-100 sidebar-header">
            <a href="{{ route('backoffice.dashboard') }}"
                class="d-flex align-items-center text-dark text-decoration-none px-1 overflow-hidden sidebar-brand">
                <img src="{{ asset('assets/images/RTCL.svg') }}" alt="Rtcl Logo" height="40" class="flex-shrink-0">
                <span class="fs-4 fw-bold ms-2 sidebar-text">Rtcl</span>
            </a>

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
                    <a href="{{ route('backoffice.admin_account_management.index') }}" title="Admin Accounts"
                        class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('backoffice.admin_account_management.*') ? 'active fw-semibold' : 'text-dark' }}"
                        @if(request()->routeIs('backoffice.admin_account_management.*'))
                        style="background-color: #0d6efd; color: #ffffff !important;" @endif>
                        <svg class="flex-shrink-0" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M5.338 1.59a61 61 0 0 0-2.837.856.48.48 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.7 10.7 0 0 0 2.287 2.233c.346.244.652.42.893.533q.18.085.293.118a1 1 0 0 0 .101.025 1 1 0 0 0 .1-.025q.114-.034.294-.118c.24-.113.547-.29.893-.533a10.7 10.7 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.8 11.8 0 0 1-2.517 2.453 7 7 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7 7 0 0 1-1.048-.625 11.8 11.8 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 63 63 0 0 1 5.072.56" />
                            <path
                                d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0" />
                        </svg>
                        <span class="sidebar-text">Admin Accounts</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('backoffice.user_account_management.index') }}" title="User Accounts"
                        class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('backoffice.user_account_management.*') ? 'active fw-semibold' : 'text-dark' }}"
                        @if(request()->routeIs('backoffice.user_account_management.*'))
                        style="background-color: #0d6efd; color: #ffffff !important;" @endif>
                        <svg class="flex-shrink-0" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
                        </svg>
                        <span class="sidebar-text">User Accounts</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('backoffice.profile.show') }}" title="Profile"
                        class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('backoffice.profile.*') ? 'active fw-semibold' : 'text-dark' }}"
                        @if(request()->routeIs('backoffice.profile.*'))
                        style="background-color: #0d6efd; color: #ffffff !important;" @endif>
                        <svg class="flex-shrink-0" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                        </svg>
                        <span class="sidebar-text">Profile</span>
                    </a>
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
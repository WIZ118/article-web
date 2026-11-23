<nav id="portal-sidebar"
    class="navbar navbar-expand-md bg-white border-end shadow-sm align-items-md-start p-3 flex-md-column">
    <div class="container-fluid flex-md-column align-items-md-stretch p-0">

        <div class="d-flex justify-content-between align-items-center w-100 sidebar-header">
            <a href="{{ route('portal.dashboard') }}"
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
                    <a href="{{ route('portal.dashboard') }}" title="Dashboard"
                        class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('portal.dashboard') ? 'active fw-semibold' : 'text-dark' }}"
                        @if(request()->routeIs('portal.dashboard'))
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
                    CMS Modules
                </li>

                <li class="nav-item">
                    <a href="{{ route('portal.cms.home') }}" title="Home Page"
                        class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('portal.cms.home*') ? 'active fw-semibold' : 'text-dark' }}"
                        @if(request()->routeIs('portal.cms.home*'))
                        style="background-color: #0d6efd; color: #ffffff !important;" @endif>
                        <svg class="flex-shrink-0" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z" />
                        </svg>
                        <span class="sidebar-text">Home Page</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('portal.cms.about') }}" title="About Us"
                        class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('portal.cms.about*') ? 'active fw-semibold' : 'text-dark' }}"
                        @if(request()->routeIs('portal.cms.about*'))
                        style="background-color: #0d6efd; color: #ffffff !important;" @endif>
                        <svg class="flex-shrink-0" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                            <path
                                d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                        </svg>
                        <span class="sidebar-text">About Us</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('portal.cms.contact') }}" title="Contact Us"
                        class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('portal.cms.contact*') ? 'active fw-semibold' : 'text-dark' }}"
                        @if(request()->routeIs('portal.cms.contact*'))
                        style="background-color: #0d6efd; color: #ffffff !important;" @endif>
                        <svg class="flex-shrink-0" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                        </svg>
                        <span class="sidebar-text">Contact Us</span>
                    </a>
                </li>

                <li class="nav-header text-uppercase text-muted fw-bold small mt-3 mb-1 px-3 sidebar-text"
                    style="font-size: 0.72rem; letter-spacing: 0.05em;">
                    Account
                </li>

                <li class="nav-item">
                    <a href="{{ route('portal.profile.show') }}" title="Profile"
                        class="nav-link d-flex align-items-center gap-2 {{ request()->routeIs('portal.profile.*') ? 'active fw-semibold' : 'text-dark' }}"
                        @if(request()->routeIs('portal.profile.*'))
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
                <form action="{{ route('portal.logout') }}" method="POST" class="m-0">
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
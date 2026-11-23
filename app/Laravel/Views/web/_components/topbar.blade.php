<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom">
  <div class="container-fluid position-relative">

    <div class="d-flex justify-content-between align-items-center flex-grow-1 flex-lg-grow-0">
      <a href="{{ route('web.home') }}" class="d-flex align-items-center text-dark text-decoration-none px-2">
        <img src="{{ asset('assets/images/RTCL.svg') }}" alt="Rtcl Logo" height="56" class="me-2">
        <span class="fs-4 fw-bold">Rtcl</span>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>

    <div class="collapse navbar-collapse pb-3 pb-lg-0" id="navbarSupportedContent">
      <ul class="navbar-nav navbar-nav-center-lg mb-2 mb-lg-0 px-2 px-lg-0 pt-2 pt-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('web.home') ? 'active fw-semibold' : '' }}"
            @if(request()->routeIs('web.home')) aria-current="page" @endif href="{{ route('web.home') }}">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('web.articles') ? 'active fw-semibold' : '' }}"
            @if(request()->routeIs('web.articles')) aria-current="page" @endif
            href="{{ route('web.articles') }}">Articles</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle {{ request()->routeIs('web.about', 'web.contact') ? 'active fw-semibold' : '' }}"
            href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            About
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="{{ route('web.about') }}"
                class="dropdown-item {{ request()->routeIs('web.about') ? 'active fw-semibold' : 'text-dark' }}"
                @if(request()->routeIs('web.about')) style="background-color: #0d6efd; color: #ffffff !important;"
                @endif>About us</a>
            </li>

            <li>
              <a href="{{ route('web.contact') }}"
                class="dropdown-item {{ request()->routeIs('web.contact') ? 'active fw-semibold' : 'text-dark' }}"
                @if(request()->routeIs('web.contact')) style="background-color: #0d6efd; color: #ffffff !important;"
                @endif>Contact us</a>
            </li>
          </ul>
        </li>
      </ul>

      <div
        class="d-flex flex-column flex-lg-row align-items-stretch align-items-lg-center gap-2 ms-lg-auto mt-2 mt-lg-0 px-2 px-lg-0">
        @if (request()->routeIs('web.articles'))
          <form class="d-flex mb-0" role="search" action="{{ route('web.articles') }}" method="GET">
            <input class="form-control form-control-sm me-2" style="min-width: 170px;" type="search" name="search"
              value="{{ request('search') }}" placeholder="Search" aria-label="Search" />
            <button class="btn btn-outline-success btn-sm" type="submit">Search</button>
          </form>
        @endif

        <div class="d-flex align-items-center justify-content-between justify-content-lg-end gap-2">
          @auth('user')
            <span class="text-dark fw-semibold text-nowrap">{{ auth('user')->user()->name }}</span>
            <a href="{{ route('portal.dashboard') }}" class="btn btn-primary btn-sm text-nowrap">User Portal</a>
          @else
            @if (Route::has('portal.auth.login'))
              <a href="{{ route('portal.auth.login') }}" class="btn btn-outline-secondary btn-sm flex-fill text-nowrap">Sign
                In</a>
            @endif
            <a href="{{ route('portal.auth.register') }}" class="btn btn-primary btn-sm flex-fill text-nowrap">Sign Up</a>
          @endauth
        </div>
      </div>
    </div>

  </div>
</nav>

<style>
  @media (min-width: 992px) {
    .navbar-nav-center-lg {
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
    }
  }
</style>
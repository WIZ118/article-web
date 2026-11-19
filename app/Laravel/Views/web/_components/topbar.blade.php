{{-- -Bootstrap script --}}

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid position-relative">

    <div class="d-flex justify-content-between align-items-center w-100">
      <a href="{{ route('web.home') }}" class="d-flex align-items-center text-dark text-decoration-none px-2">
        <img src="{{ asset('assets/images/RTCL.svg') }}" alt="Rtcl Logo" height="64" class="me-2">
        <span class="fs-4 fw-bold">Rtcl</span>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>

    <div class="collapse navbar-collapse pb-3 pb-lg-0" id="navbarSupportedContent">

      <ul class="navbar-nav mb-2 mb-lg-0 position-lg-absolute start-50 translate-middle-x-lg">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('web.home') ? 'active' : '' }}" @if(request()->routeIs('web.home'))
          aria-current="page" @endif href="{{ route('web.home') }}">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('web.articles') ? 'active' : '' }}"
            @if(request()->routeIs('web.articles')) aria-current="page" @endif
            href="{{ route('web.articles') }}">Articles</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle {{ request()->routeIs('web.about', 'web.contact') ? 'actfive' : '' }}"
            href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            About
          </a>
          <ul class="dropdown-menu">
            <li>
              <a class="dropdown-item {{ request()->routeIs('web.about') ? 'active' : '' }}"
                href="{{ route('web.about') }}">About us</a>
            </li>

            <li>
              <a class="dropdown-item {{ request()->routeIs('web.contact') ? 'active' : '' }}"
                href="{{ route('web.contact') }}">Contact us</a>
            </li>
          </ul>
        </li>
        {{--
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('portal.login') ? 'active' : '' }}"
            @if(request()->routeIs('portal.login')) aria-current="page" @endif
            href="{{ route('portal.login') }}">Admin</a>
        </li>
      </ul> --}}

      @if (request()->routeIs('web.articles'))
        <form class="d-flex ms-lg-auto mt-2 mt-lg-0" role="search" action="{{ route('web.articles') }}" method="GET">
          <input class="form-control me-2" type="search" name="search" value="{{ request('search') }}"
            placeholder="Search" aria-label="Search" />
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      @endif

    </div>
  </div>
</nav>
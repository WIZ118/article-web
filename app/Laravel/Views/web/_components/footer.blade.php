<footer class="bg-white border-top text-muted py-3 mt-auto">
    <div class="container d-flex flex-column flex-sm-row justify-content-between align-items-center gap-2 small">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-sm-start gap-2">
            <img src="{{ asset('assets/images/RTCL.svg') }}" alt="Rtcl" height="20">
            <span class="fw-semibold text-dark">Rtcl</span>
            <span>&copy; {{ date('Y') }} Iniackie Franz Sumandal. All rights reserved.</span>
        </div>

        <div class="d-flex align-items-center gap-3">
            <a href="{{ route('web.home') }}" class="text-decoration-none text-muted">Home</a>
            <a href="{{ route('web.articles') }}" class="text-decoration-none text-muted">Articles</a>
            <a href="{{ route('web.about') }}" class="text-decoration-none text-muted">About</a>
            <a href="{{ route('web.contact') }}" class="text-decoration-none text-muted">Contact</a>
        </div>
    </div>
</footer>
<footer class="bg-white border-top text-muted py-3 mt-auto">
    <div class="container d-flex flex-column flex-sm-row justify-content-between align-items-center gap-2 small">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-sm-start gap-2">
            <img src="{{ asset('assets/images/RTCL.svg') }}" alt="Rtcl" height="20">
            <span class="fw-semibold text-dark">Rtcl</span>
            <span>&copy; {{ date('Y') }} Iniackie Franz Sumandal. All rights reserved.</span>
        </div>

        <div>
            <a href="{{ route('web.home') }}" class="text-decoration-none text-muted">View Public Site</a>
        </div>
    </div>
</footer>
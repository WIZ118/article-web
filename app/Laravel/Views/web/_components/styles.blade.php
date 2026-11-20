<style>
    :root {
        --rtcl-primary: #0d6efd;
        --rtcl-border: rgba(108, 117, 125, 0.18);
        --rtcl-surface: rgba(255, 255, 255, 0.78);
    }

    body {
        background-color: floralwhite;
        color: #212529;
    }

    .card {
        background-color: var(--rtcl-surface);
        border-color: var(--rtcl-border) !important;
        border-radius: 0.75rem;
    }

    @media (min-width: 992px) {
        .position-lg-absolute {
            position: absolute !important;
        }

        .translate-middle-x-lg {
            transform: translateX(-50%) !important;
        }
    }

    .active {
        color: var(--rtcl-primary) !important;
    }

    .nav-link,
    .btn,
    .form-control,
    .dropdown-menu {
        border-radius: 0.5rem;
        transition: background-color 0.2s ease, border-color 0.2s ease, color 0.2s ease;
    }

    .nav-link:hover {
        background-color: rgba(13, 110, 253, 0.08);
    }

    .btn:hover {
        text-decoration: none;
    }

    @media (min-width: 992px) {
        .rtcl-center-nav {
            position: absolute !important;
            left: 50%;
            transform: translateX(-50%);
        }
    }
</style>
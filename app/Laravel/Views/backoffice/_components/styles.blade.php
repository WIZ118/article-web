<style>
    :root {
        --rtcl-primary: #0d6efd;
        --rtcl-border: rgba(108, 117, 125, 0.18);
        --rtcl-surface: rgba(255, 255, 255, 0.78);
    }

    body {
        background-color: lavenderblush;
        color: #212529;
    }

    .card {
        background-color: var(--rtcl-surface);
        border-color: var(--rtcl-border) !important;
        border-radius: 0.75rem;
    }

    .active {
        color: var(--rtcl-primary) !important;
    }

    .nav-link,
    .btn,
    .form-control {
        border-radius: 0.5rem;
        transition: background-color 0.2s ease, border-color 0.2s ease, color 0.2s ease;
    }

    .nav-link:hover {
        background-color: rgba(13, 110, 253, 0.08);
    }

    .btn:hover {
        text-decoration: none;
    }

    @media (min-width: 768px) {
        #portal-sidebar {
            width: 260px;
            min-width: 260px;
            max-width: 260px;
            flex-shrink: 0;
        }

        body.sidebar-collapsed #portal-sidebar {
            width: 72px;
            min-width: 72px;
            max-width: 72px;
        }
    }
</style>
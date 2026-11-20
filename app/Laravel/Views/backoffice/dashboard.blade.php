@extends('backoffice._layouts.main')

@section('content')
    <main class="flex-fill py-4 py-md-5">
        <div class="container" style="max-width: 1040px;">

            <div class="card shadow-sm mb-3">
                <div class="card-body p-4">
                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-2 ">
                        <div>
                            <h1 class="h3 fw-bold text-dark mb-1">
                                Welcome back, {{ auth('admin')->user()->name ?? 'Admin' }}
                            </h1>
                            <p class="text-secondary small mb-1">
                                <span id="live-date-time">{{ now()->format('l, F j, Y • g:i:s A') }}</span>
                            </p>
                            <p class="text-secondary small mb-0">
                                Manage your public pages and review published Rtcl content.
                            </p>
                        </div>
                        <div>
                            <a href="{{ route('web.home') }}" target="_blank" class="btn btn-outline-dark btn-sm px-3">
                                Open Live Website ↗
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-bottom my-2"></div>

            <div class="card border shadow-none rounded-3 bg-white mb-3">
                <div class="card-body p-0">
                    <div class="row g-0 text-center text-sm-start">
                        <div class="col-sm-4 p-4 border-bottom border-sm-bottom-0 border-sm-end">
                            <span class="text-uppercase text-secondary fw-semibold d-block mb-1"
                                style="font-size: 0.72rem; letter-spacing: 0.05em;">
                                Admin Accounts
                            </span>
                            <div class="d-flex align-items-baseline justify-content-center justify-content-sm-start gap-2">
                                <span class="h2 fw-bold text-dark mb-0">{{ $stats['admin_accounts'] }}</span>
                                <a href="{{ route('backoffice.admin_account_management.index') }}"
                                    class="small text-decoration-none">Manage accounts &rarr;</a>
                            </div>
                        </div>

                        <div class="col-sm-4 p-4 border-bottom border-sm-bottom-0 border-sm-end">
                            <span class="text-uppercase text-secondary fw-semibold d-block mb-1"
                                style="font-size: 0.72rem; letter-spacing: 0.05em;">
                                Published Articles
                            </span>
                            <div class="d-flex align-items-baseline justify-content-center justify-content-sm-start gap-2">
                                <span class="h2 fw-bold text-dark mb-0">{{ $stats['published_articles'] }}</span>
                                <a href="{{ route('web.articles') }}" target="_blank"
                                    class="small text-decoration-none">View feed &rarr;</a>
                            </div>
                        </div>

                        <div class="col-sm-4 p-4">
                            <span class="text-uppercase text-secondary fw-semibold d-block mb-1"
                                style="font-size: 0.72rem; letter-spacing: 0.05em;">
                                Website Status
                            </span>
                            <div
                                class="d-flex align-items-center justify-content-center justify-content-sm-start gap-2 mt-1">
                                <span
                                    class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1">{{ $stats['site_status'] }}</span>
                                <span class="text-secondary small">All pages active</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border shadow-none rounded-3 bg-white mb-3">
                <div
                    class="card-header bg-white border-bottom py-3 px-3 px-md-4 d-flex flex-wrap gap-1 justify-content-between align-items-center">
                    <h2 class="h6 fw-bold text-dark mb-0">Account Management</h2>
                    <span class="text-secondary small">Review and manage portal accounts</span>
                </div>
                <div class="card-body p-3 p-md-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <a href="{{ route('backoffice.admin_account_management.index') }}"
                                class="p-3 rounded-3 text-decoration-none d-flex justify-content-between align-items-center border h-100">
                                <div>
                                    <div class="fw-semibold text-dark">Admin Accounts</div>
                                    <div class="text-secondary small">{{ $stats['admin_accounts'] }} accounts</div>
                                </div>
                                <span class="text-primary">&rarr;</span>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('backoffice.user_account_management.index') }}"
                                class="p-3 rounded-3 text-decoration-none d-flex justify-content-between align-items-center border h-100">
                                <div>
                                    <div class="fw-semibold text-dark">User Portal Accounts</div>
                                    <div class="text-secondary small">{{ $stats['user_accounts'] }} accounts</div>
                                </div>
                                <span class="text-primary">&rarr;</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-7">
                    <div class="card border shadow-none rounded-3 bg-white h-100">
                        <div
                            class="card-header bg-white border-bottom py-3 px-3 px-md-4 d-flex justify-content-between align-items-center">
                            <h2 class="h6 fw-bold text-dark mb-0">Public Content</h2>
                            <a href="{{ route('web.articles') }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                View All
                            </a>
                        </div>

                        <div class="card-body p-3 p-md-4">
                            <p class="text-secondary mb-3">There are {{ $stats['published_articles'] }} published articles
                                on the public website.</p>
                            <a href="{{ route('web.articles') }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                View Public Articles &rarr;
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="card border shadow-none rounded-3 bg-white h-100">
                        <div class="card-header bg-white border-bottom py-3 px-3 px-md-4">
                            <h2 class="h6 fw-bold text-dark mb-0">Site Readiness &amp; Shortcuts</h2>
                        </div>

                        <div class="card-body p-3 p-md-4 d-flex flex-column justify-content-between gap-3">
                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <span class="small fw-semibold text-dark">Portal Accounts</span>
                                    <span class="small fw-bold text-success">{{ $stats['user_accounts'] }} total</span>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%;"
                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="d-flex flex-column gap-2">
                                <a href="{{ route('web.articles') }}" target="_blank"
                                    class="p-3 rounded-3 text-decoration-none d-flex justify-content-between align-items-center border"
                                    style="background-color: aliceblue;">
                                    <div>
                                        <div class="fw-semibold text-dark small">Browse Public Articles</div>
                                        <div class="text-secondary" style="font-size: 0.78rem;">Inspect all
                                            {{ $stats['published_articles'] }} live posts on Rtcl
                                        </div>
                                    </div>
                                    <span
                                        class="bg-white text-dark rounded-circle border d-inline-flex align-items-center justify-content-center flex-shrink-0"
                                        style="width: 30px; height: 30px;">&#8599;</span>
                                </a>

                                <a href="{{ route('backoffice.profile.show') }}"
                                    class="p-3 rounded-3 text-decoration-none d-flex justify-content-between align-items-center border"
                                    style="background-color: honeydew;">
                                    <div>
                                        <div class="fw-semibold text-dark small">Review Admin Profile</div>
                                        <div class="text-secondary" style="font-size: 0.78rem;">View or update your account
                                            details</div>
                                    </div>
                                    <span
                                        class="bg-white text-dark rounded-circle border d-inline-flex align-items-center justify-content-center flex-shrink-0"
                                        style="width: 30px; height: 30px;">&#8594;</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection

@section('page-styles')
    <style>
        body {
            background-color: lavenderblush;
        }
    </style>
@endsection

@section('page-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dateTimeEl = document.getElementById('live-date-time');

            function updateDateTime() {
                const now = new Date();
                const datePart = now.toLocaleDateString('en-US', {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });
                const timePart = now.toLocaleTimeString('en-US', {
                    hour: 'numeric',
                    minute: '2-digit',
                    second: '2-digit'
                });
                dateTimeEl.textContent = `${datePart} \u2022 ${timePart}`;
            }

            if (dateTimeEl) {
                updateDateTime();
                setInterval(updateDateTime, 1000);
            }
        });
    </script>
@endsection
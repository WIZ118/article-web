@extends('portal._layouts.main')

@section('content')
    <main class="flex-fill py-4 py-md-5">
        <div class="container" style="max-width: 1040px;">

            <div class="card shadow-sm mb-4">
                <div class="card-body p-4">
                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-2 ">
                        <div>
                            <h1 class="h3 fw-bold text-dark mb-1">
                                Welcome back, {{ auth('user')->user()->name ?? 'User' }}
                            </h1>
                            <p class="text-secondary small mb-1">
                                <span id="live-date-time">{{ now()->format('l, F j, Y • g:i:s A') }}</span>
                            </p>
                            <p class="text-secondary small mb-0">Manage your public pages and review published Rtcl content.
                            </p>
                        </div>
                        <div>
                            <a href="{{ route('web.home') }}" target="_blank" class="btn btn-outline-dark btn-sm px-3">
                                Open Live Website &#8599;
                            </a>
                        </div>
                    </div>

                    <div class="card border shadow-none rounded-3 bg-white mb-4">
                        <div class="card-body p-0">
                            <div class="row g-0 text-center text-sm-start">
                                <div class="col-sm-4 p-4 border-bottom border-sm-bottom-0 border-sm-end">
                                    <span class="text-uppercase text-secondary fw-semibold d-block mb-1"
                                        style="font-size: 0.72rem; letter-spacing: 0.05em;">
                                        Editable Pages
                                    </span>
                                    <div
                                        class="d-flex align-items-baseline justify-content-center justify-content-sm-start gap-2">
                                        <span class="h2 fw-bold text-dark mb-0">{{ $stats['editable_pages'] }}</span>
                                        <span class="text-secondary small">CMS sections</span>
                                    </div>
                                </div>

                                <div class="col-sm-4 p-4 border-bottom border-sm-bottom-0 border-sm-end">
                                    <span class="text-uppercase text-secondary fw-semibold d-block mb-1"
                                        style="font-size: 0.72rem; letter-spacing: 0.05em;">
                                        Published Articles
                                    </span>
                                    <div
                                        class="d-flex align-items-baseline justify-content-center justify-content-sm-start gap-2">
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

                    <div class="card border shadow-none rounded-3 bg-white mb-4">
                        <div
                            class="card-header bg-white border-bottom py-3 px-3 px-md-4 d-flex flex-wrap gap-1 justify-content-between align-items-center">
                            <h2 class="h6 fw-bold text-dark mb-0">Website Pages</h2>
                            <span class="text-secondary small">Select a page to edit its content</span>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr class="text-uppercase text-secondary"
                                        style="font-size: 0.72rem; letter-spacing: 0.05em;">
                                        <th class="ps-3 ps-md-4 py-3 fw-semibold">Page</th>
                                        <th class="py-3 fw-semibold d-none d-md-table-cell">Public Route</th>
                                        <th class="py-3 fw-semibold d-none d-lg-table-cell">Editable Sections</th>
                                        <th class="pe-3 pe-md-4 py-3 text-end fw-semibold">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cms_pages as $page)
                                        <tr>
                                            <td class="ps-3 ps-md-4 py-3 {{ $loop->last ? 'border-bottom-0' : '' }}">
                                                <div class="fw-semibold text-dark">{{ $page['title'] }}</div>
                                                <div class="text-secondary small">{{ $page['subtitle'] }}</div>
                                                <code
                                                    class="d-inline-block d-md-none text-secondary bg-light px-2 py-0 rounded small mt-1">{{ $page['route_path'] }}</code>
                                            </td>
                                            <td class="py-3 d-none d-md-table-cell {{ $loop->last ? 'border-bottom-0' : '' }}">
                                                <code
                                                    class="text-secondary bg-light px-2 py-1 rounded small">{{ $page['route_path'] }}</code>
                                            </td>
                                            <td
                                                class="py-3 text-secondary small d-none d-lg-table-cell {{ $loop->last ? 'border-bottom-0' : '' }}">
                                                {{ $page['sections'] }}
                                            </td>
                                            <td class="pe-3 pe-md-4 py-3 text-end {{ $loop->last ? 'border-bottom-0' : '' }}">
                                                <div class="d-inline-flex flex-wrap justify-content-end gap-1 gap-sm-2">
                                                    <a href="{{ route($page['preview_route']) }}" target="_blank"
                                                        class="btn btn-sm btn-light border">Preview</a>
                                                    <a href="{{ route($page['edit_route']) }}"
                                                        class="btn btn-sm btn-primary px-3">Edit</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row g-4">
                        <div class="col-lg-7">
                            <div class="card border shadow-none rounded-3 bg-white h-100">
                                <div
                                    class="card-header bg-white border-bottom py-3 px-3 px-md-4 d-flex justify-content-between align-items-center">
                                    <h2 class="h6 fw-bold text-dark mb-0">Recent Articles</h2>
                                    <a href="{{ route('web.articles') }}" target="_blank"
                                        class="btn btn-sm btn-outline-primary">
                                        + New Article
                                    </a>
                                </div>

                                <div class="list-group list-group-flush">
                                    @foreach ($recent_articles as $article)
                                        <a href="{{ route($article['route']) }}" target="_blank"
                                            class="list-group-item list-group-item-action px-3 px-md-4 py-3 {{ $loop->last ? 'border-bottom-0' : '' }} d-flex align-items-center justify-content-between gap-3">
                                            <div class="d-flex align-items-center gap-3">
                                                <img src="{{ asset($article['image']) }}" alt="{{ $article['title'] }}"
                                                    class="rounded-2 object-fit-cover" width="44" height="44">
                                                <div>
                                                    <div class="fw-semibold text-dark small">{{ $article['title'] }}</div>
                                                    <div class="text-secondary small">{{ $article['uploaded_at'] }}</div>
                                                </div>
                                            </div>
                                            <span class="text-secondary small">&#8599;</span>
                                        </a>
                                    @endforeach
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
                                            <span class="small fw-semibold text-dark">CMS Setup Progress</span>
                                            <span class="small fw-bold text-success">{{ $stats['editable_pages'] }} /
                                                {{ $stats['editable_pages'] }} Pages</span>
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

                                        <a href="{{ route('portal.cms.home') }}"
                                            class="p-3 rounded-3 text-decoration-none d-flex justify-content-between align-items-center border"
                                            style="background-color: honeydew;">
                                            <div>
                                                <div class="fw-semibold text-dark small">Update Hero Graphic</div>
                                                <div class="text-secondary" style="font-size: 0.78rem;">Currently using
                                                    home1.svg
                                                </div>
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
            </div>
    </main>
@endsection

@section('page-styles')
    <style>
        body {
            background-color: aliceblue;
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
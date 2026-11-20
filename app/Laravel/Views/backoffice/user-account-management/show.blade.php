@extends('backoffice._layouts.main')

@section('content')
    <main class="flex-fill py-4 py-md-5">
        <div class="container" style="max-width: 860px;">
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
                <div>
                    <p class="text-uppercase text-primary fw-semibold small mb-1" style="letter-spacing: 0.05em;">
                        User Account Management
                    </p>
                    <h1 class="h3 fw-bold text-dark mb-1">User Account Details</h1>
                    <p class="text-secondary mb-0">View portal user profile information and account metadata.</p>
                </div>

                <div class="d-flex align-items-center gap-2">
                    <a href="{{ route('backoffice.user_account_management.index') }}"
                        class="btn btn-outline-secondary d-inline-flex align-items-center gap-2">
                        <svg width="15" height="15" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                        </svg>
                        <span>Back</span>
                    </a>

                    <a href="{{ route('backoffice.user_account_management.edit', $record->id) }}"
                        class="btn btn-primary d-inline-flex align-items-center gap-2 shadow-sm">
                        <svg width="15" height="15" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                        </svg>
                        <span>Edit Account</span>
                    </a>
                </div>
            </div>

            <div class="card shadow-sm border-0 overflow-hidden">
                <div class="card-body p-4 p-md-5">
                    <div class="d-flex flex-column flex-sm-row align-items-center align-items-sm-start gap-4">
                        @if (!empty($record->profile_photo_path))
                            <img src="{{ asset('storage/' . $record->profile_photo_path) }}" alt="Profile photo"
                                class="rounded-circle object-fit-cover shadow-sm border border-2 border-white flex-shrink-0"
                                width="104" height="104">
                        @else
                            <div class="rounded-circle bg-success-subtle text-success d-flex align-items-center justify-content-center fw-bold fs-2 flex-shrink-0 shadow-sm"
                                style="width: 104px; height: 104px;">
                                {{ strtoupper(substr($record->name ?? 'U', 0, 1)) }}
                            </div>
                        @endif

                        <div class="text-center text-sm-start my-auto">
                            <h2 class="h4 fw-bold text-dark mb-1">{{ $record->name }}</h2>
                            <p class="text-secondary mb-3 text-break">{{ $record->email }}</p>
                            <div class="d-flex flex-wrap justify-content-center justify-content-sm-start gap-2">
                                <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2">
                                    Portal User
                                </span>
                                <span
                                    class="badge bg-light text-dark border px-3 py-2 d-inline-flex align-items-center gap-1">
                                    <svg width="8" height="8" fill="currentColor" class="text-success" viewBox="0 0 16 16">
                                        <circle cx="8" cy="8" r="8" />
                                    </svg>
                                    <span>Active</span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded border h-100">
                                <div
                                    class="d-flex align-items-center gap-2 text-secondary small fw-semibold text-uppercase mb-1">
                                    <svg width="14" height="14" fill="currentColor" class="text-primary"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                                    </svg>
                                    <span>Full Name</span>
                                </div>
                                <p class="fw-semibold text-dark mb-0">{{ $record->name ?? 'N/A' }}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded border h-100">
                                <div
                                    class="d-flex align-items-center gap-2 text-secondary small fw-semibold text-uppercase mb-1">
                                    <svg width="14" height="14" fill="currentColor" class="text-primary"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                                    </svg>
                                    <span>Email Address</span>
                                </div>
                                <p class="fw-semibold text-dark mb-0 text-break">{{ $record->email ?? 'N/A' }}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded border h-100">
                                <div
                                    class="d-flex align-items-center gap-2 text-secondary small fw-semibold text-uppercase mb-1">
                                    <svg width="14" height="14" fill="currentColor" class="text-primary"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                                    </svg>
                                    <span>Member Since</span>
                                </div>
                                <p class="fw-semibold text-dark mb-0">
                                    {{ $record->created_at ? $record->created_at->format('F d, Y') : 'N/A' }}
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded border h-100">
                                <div
                                    class="d-flex align-items-center gap-2 text-secondary small fw-semibold text-uppercase mb-1">
                                    <svg width="14" height="14" fill="currentColor" class="text-primary"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0" />
                                    </svg>
                                    <span>Last Updated</span>
                                </div>
                                <p class="fw-semibold text-dark mb-0">
                                    {{ $record->updated_at ? $record->updated_at->format('F d, Y • h:i A') : 'N/A' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
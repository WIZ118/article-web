@extends('portal._layouts.main')

@section('content')
    <main class="flex-fill py-4 py-md-5">
        <div class="container" style="max-width: 860px;">
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
                <div>
                    <p class="text-uppercase text-primary fw-semibold small mb-1">Account</p>
                    <h1 class="h3 fw-bold text-dark mb-1">My Profile</h1>
                    <p class="text-secondary mb-0">Manage your User Portal account details.</p>
                </div>
                <a href="{{ route('portal.profile.edit') }}" class="btn btn-primary">Edit Profile</a>
            </div>

            <div class="card shadow-sm border-0 overflow-hidden">
                <div class="card-body p-4 p-md-5">
                    <div class="d-flex flex-column flex-sm-row align-items-center align-items-sm-start gap-4">
                        @if ($record->profile_photo_path)
                            <img src="{{ asset('storage/' . $record->profile_photo_path) }}" alt="Profile photo"
                                class="rounded-circle object-fit-cover shadow-sm flex-shrink-0" width="112" height="112">
                        @else
                            <div class="rounded-circle bg-primary-subtle text-primary d-flex align-items-center justify-content-center fw-bold fs-2 flex-shrink-0"
                                style="width: 112px; height: 112px;">
                                {{ strtoupper(substr($record->name ?? 'U', 0, 1)) }}
                            </div>
                        @endif
                        <div class="text-center text-sm-start">
                            <h2 class="h4 fw-bold text-dark mb-1">{{ $record->name }}</h2>
                            <p class="text-secondary mb-3">{{ $record->email }}</p>
                            <span class="badge text-bg-light border">User Portal member</span>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="row g-4">
                        <div class="col-md-6">
                            <small class="text-uppercase text-secondary fw-semibold">Full name</small>
                            <p class="fw-semibold text-dark mb-0 mt-1">{{ $record->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <small class="text-uppercase text-secondary fw-semibold">Email address</small>
                            <p class="fw-semibold text-dark mb-0 mt-1">{{ $record->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

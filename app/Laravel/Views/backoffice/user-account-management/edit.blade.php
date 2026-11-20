@extends('backoffice._layouts.main')

@section('content')
    <main class="flex-fill py-4 py-md-5">
        <div class="container" style="max-width: 860px;">
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
                <div>
                    <p class="text-uppercase text-primary fw-semibold small mb-1" style="letter-spacing: 0.05em;">
                        User Account Management
                    </p>
                    <h1 class="h3 fw-bold text-dark mb-1">Edit User Account</h1>
                    <p class="text-secondary mb-0">Update portal user details or set a new password.</p>
                </div>

                <a href="{{ route('backoffice.user_account_management.index') }}"
                    class="btn btn-outline-secondary d-inline-flex align-items-center justify-content-center gap-2">
                    <svg width="15" height="15" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                    </svg>
                    <span>Back to List</span>
                </a>
            </div>

            <div class="card shadow-sm border-0 overflow-hidden">
                <div class="card-header bg-white py-3 px-4 border-bottom d-flex align-items-center gap-3">
                    <div class="rounded-circle bg-success-subtle text-success fw-bold d-flex align-items-center justify-content-center flex-shrink-0"
                        style="width: 42px; height: 42px;">
                        {{ strtoupper(substr($record->name ?? 'U', 0, 1)) }}
                    </div>
                    <div class="min-w-0">
                        <div class="fw-bold text-dark text-truncate">{{ $record->name }}</div>
                        <div class="text-muted small text-truncate">{{ $record->email }}</div>
                    </div>
                </div>

                <form action="{{ route('backoffice.user_account_management.update', $record->id) }}" method="POST">
                    @csrf
                    <div class="card-body p-4 p-md-5">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label fw-semibold text-secondary small text-uppercase">
                                    Full Name
                                </label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" placeholder="Juan Dela Cruz" value="{{ old('name', $record->name) }}">
                                @if ($errors->first('name'))
                                    <div class="text-danger small mt-1">{{ $errors->first('name') }}</div>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label fw-semibold text-secondary small text-uppercase">
                                    Email Address
                                </label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" placeholder="name@example.com" value="{{ old('email', $record->email) }}">
                                @if ($errors->first('email'))
                                    <div class="text-danger small mt-1">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="mb-3">
                            <h6 class="fw-bold text-dark mb-1">Change Password</h6>
                            <p class="text-muted small mb-0">Leave both fields blank if you do not want to change the
                                current password.</p>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="password" class="form-label fw-semibold text-secondary small text-uppercase">
                                    New Password
                                </label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="Enter new password">
                                @if ($errors->first('password'))
                                    <div class="text-danger small mt-1">{{ $errors->first('password') }}</div>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label for="password_confirmation"
                                    class="form-label fw-semibold text-secondary small text-uppercase">
                                    Confirm Password
                                </label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="Repeat new password">
                            </div>
                        </div>
                    </div>

                    <div
                        class="card-footer bg-white py-3 px-4 border-top d-flex flex-column flex-sm-row justify-content-end gap-2">
                        <a href="{{ route('backoffice.user_account_management.index') }}"
                            class="btn btn-outline-secondary">Cancel</a>
                        <button type="submit"
                            class="btn submit-btn btn-primary d-inline-flex align-items-center justify-content-center gap-2 px-4">
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                            </svg>
                            <span>Update Account</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection

@section('page-scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const submitBtn = document.querySelector('.submit-btn');
            const form = submitBtn.closest('form');

            form.addEventListener('submit', function (event) {
                event.preventDefault();

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Are you sure you want to save these changes?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, save changes!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
@extends('portal._layouts.main')

@section('content')
    <main class="flex-fill py-4 py-md-5">
        <div class="container" style="max-width: 860px;">
            <div class="mb-4">
                <p class="text-uppercase text-primary fw-semibold small mb-1">Account settings</p>
                <h1 class="h3 fw-bold text-dark mb-1">Edit My Profile</h1>
                <p class="text-secondary mb-0">Update your details or choose a profile picture.</p>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-body p-4 p-md-5">
                    <form action="{{ route('portal.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-4">
                            <div class="col-md-4 text-center">
                                @if ($record->profile_photo_path)
                                    <img src="{{ asset('storage/' . $record->profile_photo_path) }}" alt="Current profile photo"
                                        class="rounded-circle object-fit-cover mb-3" width="128" height="128">
                                @else
                                    <div class="rounded-circle bg-primary-subtle text-primary d-inline-flex align-items-center justify-content-center fw-bold fs-1 mb-3"
                                        style="width: 128px; height: 128px;">
                                        {{ strtoupper(substr($record->name ?? 'U', 0, 1)) }}
                                    </div>
                                @endif
                                <label for="profile_photo" class="form-label d-block fw-semibold text-dark">Profile
                                    picture</label>
                                <input type="file" class="form-control form-control-sm" id="profile_photo"
                                    name="profile_photo" accept=".jpg,.jpeg,.png,.webp">
                                <small class="text-secondary d-block mt-2">JPG, PNG, or WebP up to 2 MB.</small>
                                @if ($errors->first('profile_photo'))
                                    <small class="text-danger d-block mt-1">{{ $errors->first('profile_photo') }}</small>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-semibold">Full Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name', $record->name) }}" required>
                                    @if ($errors->first('name')) <small
                                    class="text-danger">{{ $errors->first('name') }}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label fw-semibold">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ old('email', $record->email) }}" required>
                                    @if ($errors->first('email')) <small
                                    class="text-danger">{{ $errors->first('email') }}</small> @endif
                                </div>
                                <hr class="my-4">
                                <p class="text-secondary small">Leave the password fields blank to keep your current
                                    password.</p>
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <label for="password" class="form-label fw-semibold">New Password</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="password_confirmation" class="form-label fw-semibold">Confirm
                                            Password</label>
                                        <input type="password" class="form-control" id="password_confirmation"
                                            name="password_confirmation">
                                    </div>
                                </div>
                                @if ($errors->first('password')) <small
                                class="text-danger d-block mt-1">{{ $errors->first('password') }}</small> @endif
                            </div>
                        </div>
                        <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                            <a href="{{ route('portal.profile.show') }}"
                                class="btn submit-btn btn-outline-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
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
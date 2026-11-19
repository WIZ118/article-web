@extends('backoffice._layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Create Account</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf
                            <div class="card-body p-4 p-md-5">
                                <div class="mb-3">
                                    <label for="full_name" class="form-label fw-bold text-secondary">Full Name</label>
                                    <input type="text" class="form-control" id="full-name" name="full_name"
                                        placeholder="Juan Dela Cruz" value="{{ old('full_name') }}">
                                    @if ($errors->first('full_name'))
                                        <div class="text-left">
                                            <small class="text-danger">
                                                {{ $errors->first('full_name') }}
                                            </small>
                                        </div>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="email_address" class="form-label fw-bold text-secondary">Email
                                        Address</label>
                                    <input type="email" class="form-control" id="email_address" name="email_address"
                                        placeholder="name@example.com" value="{{ old('email_address') }}">
                                    @if ($errors->first('email_address'))
                                        <div class="text-left">
                                            <small class="text-danger">
                                                {{ $errors->first('email_address') }}
                                            </small>
                                        </div>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="user_password" class="form-label fw-bold text-secondary">Password</label>

                                    <input type="password" class="form-control" id="user_password" name="user_password"
                                        placeholder="Create a password">
                                </div>

                                <div class="mb-4">
                                    <label for="confirm_password" class="form-label fw-bold text-secondary">Confirm
                                        Password</label>
                                    <input type="password" class="form-control" id="confirm_password"
                                        name="confirm_password" placeholder="Repeat your password">
                                    @if ($errors->first('user_password'))
                                        <div class="text-left">
                                            <small class="text-danger">
                                                {{ $errors->first('user_password') }}
                                            </small>
                                        </div>
                                    @endif
                                </div>

                                <div class="d-grid mb-4">
                                    <button type="submit" class="btn submit-btn btn-primary btn-lg">Create Account</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                    text: "Do you want to register with the provided information?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, register!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
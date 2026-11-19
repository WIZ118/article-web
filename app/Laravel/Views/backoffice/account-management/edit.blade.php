@extends('backoffice._layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Account</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf
                            <div class="card-body p-4 p-md-5">
                                <div class="mb-3">
                                    <label for="full_name" class="form-label fw-bold text-secondary">Full Name</label>
                                    <input type="text" class="form-control" id="full-name" name="full_name"
                                        placeholder="Juan Dela Cruz" value="{{ old('full_name', $record->full_name) }}">
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
                                        placeholder="name@example.com"
                                        value="{{ old('email_address', $record->email_address) }}">
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
                                    <label for="user_password_confirmation"
                                        class="form-label fw-bold text-secondary">Confirm
                                        Password</label>
                                    <input type="password" class="form-control" id="user_password_confirmation"
                                        name="user_password_confirmation" placeholder="Repeat your password">
                                    @if ($errors->first('user_password'))
                                        <div class="text-left">
                                            <small class="text-danger">
                                                {{ $errors->first('user_password') }}
                                            </small>
                                        </div>
                                    @endif
                                </div>

                                <div class="d-grid mb-4">
                                    <button type="submit" class="btn submit-btn btn-primary btn-lg">Update Account</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
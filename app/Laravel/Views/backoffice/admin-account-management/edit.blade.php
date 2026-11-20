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
                        <form action="{{ route('backoffice.admin_account_management.update', $record->id) }}" method="POST">
                            @csrf
                            <div class="card-body p-4 p-md-5">
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold text-secondary">Full Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Juan Dela Cruz" value="{{ old('name', $record->name) }}">
                                    @if ($errors->first('name'))
                                        <div class="text-left">
                                            <small class="text-danger">
                                                {{ $errors->first('name') }}
                                            </small>
                                        </div>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label fw-bold text-secondary">Email
                                        Address</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="name@example.com"
                                        value="{{ old('email', $record->email) }}">
                                    @if ($errors->first('email'))
                                        <div class="text-left">
                                            <small class="text-danger">
                                                {{ $errors->first('email') }}
                                            </small>
                                        </div>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label fw-bold text-secondary">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Create a password">
                                </div>

                                <div class="mb-4">
                                    <label for="password_confirmation"
                                        class="form-label fw-bold text-secondary">Confirm
                                        Password</label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" placeholder="Repeat your password">
                                    @if ($errors->first('password'))
                                        <div class="text-left">
                                            <small class="text-danger">
                                                {{ $errors->first('password') }}
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
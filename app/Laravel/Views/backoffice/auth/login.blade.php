@extends('backoffice._layouts.main')

@section('content')
    <main class="flex-fill d-flex align-items-center justify-content-center py-5">
        <div class="container w-100" style="max-width: 460px;">
            <div class="text-center mb-4">
                <a href="{{ route('web.home') }}" class="d-inline-flex align-items-center text-decoration-none mb-2">
                    <img src="{{ asset('assets/images/RTCL.svg') }}" alt="Rtcl Logo" height="64" class="me-2">
                    <span class="display-6 fw-bold text-primary">Rtcl</span>
                </a>
                <p class="lead text-secondary fs-6 mb-0">Sign in to access the Rtcl Backoffice Portal</p>
            </div>

            <div class="card shadow-sm">
                <form action="" method="POST">
                    @csrf
                    <div class="card-body p-4 p-md-5">
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold text-secondary">Email Address</label>
                            <input type="email" class="form-control form-control-lg" id="email" name="email"
                                placeholder="name@example.com" required>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label fw-bold text-secondary">Password</label>
                            <input type="password" class="form-control form-control-lg" id="password" name="password"
                                placeholder="Enter your password" required>
                        </div>

                        <div class="d-grid mb-4">
                            <button type="submit" class="btn btn-primary btn-lg">Sign In</button>
                        </div>

                        <div class="d-flex align-items-center mb-3">
                            <hr class="flex-grow-1 text-secondary opacity-25">
                            <span class="px-3 text-uppercase text-secondary fw-bold"
                                style="font-size: 0.72rem; letter-spacing: 0.05em;">
                                Or sign in with
                            </span>
                            <hr class="flex-grow-1 text-secondary opacity-25">
                        </div>

                        <div class="row g-2">
                            <div class="col-4">
                                <button type="button"
                                    class="btn btn-outline-secondary w-100 py-2 d-flex align-items-center justify-content-center gap-2"
                                    aria-label="Sign up with Facebook">
                                    <svg width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                                    </svg>
                                    <span class="small fw-semibold">Facebook</span>
                                </button>
                            </div>

                            <div class="col-4">
                                <button type="button"
                                    class="btn btn-outline-secondary w-100 py-2 d-flex align-items-center justify-content-center gap-2"
                                    aria-label="Sign in with Google">
                                    <svg width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M15.545 6.558a9.4 9.4 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.7 7.7 0 0 1 5.352 2.082l-2.284 2.284A4.35 4.35 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.8 4.8 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.7 3.7 0 0 0 1.599-2.431H8v-3.08z" />
                                    </svg>
                                    <span class="small fw-semibold">Google</span>
                                </button>
                            </div>
                            <div class="col-4">
                                <button type="button"
                                    class="btn btn-outline-secondary w-100 py-2 d-flex align-items-center justify-content-center gap-2"
                                    aria-label="Sign in with Email Link">
                                    <svg width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                                    </svg>
                                    <span class="small fw-semibold">SSO</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-white text-center py-3">
                        <small class="text-body-secondary">
                            Don't have an account?
                            <a href="{{ route('backoffice.auth.register') }}"
                                class="text-decoration-none fw-semibold">Register
                                here</a>
                        </small>
                    </div>
                </form>
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
@endsection
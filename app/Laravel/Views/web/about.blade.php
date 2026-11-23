@extends('web._layouts.main')

@section('content')
    <main class="flex-fill d-flex align-items-center justify-content-center" style="min-height: 75vh;">
        <div class="container py-5">
            <div class="row align-items-center gy-5 mb-5">
                <div class="col-md-6 text-center order-md-1">
                    <img src="{{ asset('assets/images/about1.svg') }}" alt="About Page Graphic" class="img-fluid">
                </div>

                <div class="col-md-6 text-center text-md-start order-md-2">
                    <p class="text-uppercase text-primary fw-semibold small mb-1" style="letter-spacing: 0.05em;">Who We Are
                    </p>
                    <h1 class="display-4 fw-bold mb-3 text-dark">About Rtcl</h1>
                    <p class="lead text-secondary mb-4">
                        Rtcl is a modern web publishing and article management platform designed to streamline content
                        creation, editorial organization, and reader engagement across a unified portal experience.
                    </p>
                    <div>
                        <a href="{{ route('web.contact') }}" class="btn btn-primary btn-lg px-4 shadow-sm">
                            Contact us
                        </a>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm text-start">
                        <div class="card-body p-4 d-flex flex-column">
                            <h3 class="card-title fw-bold text-dark mb-3">Our Mission</h3>
                            <p class="card-text text-secondary flex-grow-1 mb-0">
                                To empower writers, editors, and administrators with an intuitive, structured workspace
                                that makes publishing clear, reliable, and accessible to every reader.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm text-start">
                        <div class="card-body p-4 d-flex flex-column">
                            <h3 class="card-title fw-bold text-dark mb-3">Our Vision</h3>
                            <p class="card-text text-secondary flex-grow-1 mb-0">
                                To serve as a trusted digital hub where well-organized articles and seamless content
                                governance foster continuous learning and informed communities.
                            </p>
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
@endsection
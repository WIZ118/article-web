@extends('web._layouts.main')

@section('content')
    <main class="flex-fill d-flex align-items-center justify-content-center">
        <div class="container text-center py-5" style="max-width: 860px;">
            <h1 class="display-4 fw-bold mb-3 text-dark">{{ $contact['heading'] ?? 'Contact us' }}</h1>

            <div class="card shadow-sm border border-secondary border-opacity-10 bg-white bg-opacity-75 mb-4">
                <div class="card-body p-4 p-md-5">
                    <form action="#" method="POST">
                        @csrf

                        <div class="row g-3 mb-4">
                            <div class="col-md-6 text-start">
                                <label for="name" class="form-label fw-bold text-secondary">Name</label>
                                <input type="text"
                                    class="form-control bg-white bg-opacity-75 border-secondary border-opacity-25" id="name"
                                    name="name" placeholder="Enter your name here" required>
                            </div>

                            <div class="col-md-6 text-start">
                                <label for="email" class="form-label fw-bold text-secondary">Email</label>
                                <input type="email"
                                    class="form-control bg-white bg-opacity-75 border-secondary border-opacity-25"
                                    id="email" name="email" placeholder="Enter email here" value="{{ old('email') }}"
                                    required>
                            </div>
                        </div>

                        <div class="mb-4 text-start">
                            <label for="content" class="form-label fw-bold text-secondary">Message</label>
                            <textarea class="form-control bg-white bg-opacity-75 border-secondary border-opacity-25"
                                id="content" name="content" rows="6" placeholder="Write your message here..."
                                required></textarea>
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <a href="{{ route('web.about') }}" class="btn btn-outline-secondary">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-primary px-4">
                                Send
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row g-3 text-start mb-4">
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border border-secondary border-opacity-10 bg-white bg-opacity-75">
                        <div class="card-body p-3">
                            <small class="text-uppercase text-secondary fw-bold d-block mb-1"
                                style="font-size: 0.72rem; letter-spacing: 0.05em;">Email</small>
                            <span class="fw-semibold text-dark small">{{ $contact['support_email'] ??
                                'contact@rtcl.example.com' }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border border-secondary border-opacity-10 bg-white bg-opacity-75">
                        <div class="card-body p-3">
                            <small class="text-uppercase text-secondary fw-bold d-block mb-1"
                                style="font-size: 0.72rem; letter-spacing: 0.05em;">Phone</small>
                            <span
                                class="fw-semibold text-dark small">{{ $contact['phone_number'] ?? '+63 900 000 0000' }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border border-secondary border-opacity-10 bg-white bg-opacity-75">
                        <div class="card-body p-3">
                            <small class="text-uppercase text-secondary fw-bold d-block mb-1"
                                style="font-size: 0.72rem; letter-spacing: 0.05em;">Office</small>
                            <span
                                class="fw-semibold text-dark small">{{ $contact['office_address'] ?? 'Olongapo City' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <p class="lead text-secondary mb-0 text-center">
                {{ $contact['closing_note'] ?? 'Thank you for contacting us. We will get back to you as soon as possible.' }}
            </p>
        </div>
    </main>
@endsection

@section('page-styles')
    <style>
        body {
            background-color: seashell;
        }
    </style>
@endsection

@section('page-scripts')
@endsection
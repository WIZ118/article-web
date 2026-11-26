@extends('web._layouts.main')

@section('content')
    <main class="flex-fill d-flex align-items-center justify-content-center py-5">
        <div class="container" style="max-width: 980px;">
            <div class="text-center mx-auto mb-5" style="max-width: 640px;">
                <p class="text-uppercase text-primary fw-semibold small mb-1" style="letter-spacing: 0.05em;">Get In Touch
                </p>
                <h1 class="display-5 fw-bold mb-2 text-dark">{{ $contact->title ?? 'Contact us' }}</h1>
                @if (!empty($contact?->content))
                    <div class="text-secondary mb-0">{!! $contact->content !!}</div>
                @else
                    <p class="text-secondary mb-0">
                        Have questions or feedback about Rtcl? Send us a message and our team will respond shortly.
                    </p>
                @endif
            </div>

            <div class="row g-4 align-items-stretch">
                <div class="col-lg-7">
                    <div class="card h-100 shadow-sm border border-secondary border-opacity-10 bg-white bg-opacity-75">
                        <div class="card-body p-4 p-md-5">
                            <h5 class="fw-bold text-dark mb-4">Send a Message</h5>

                            <form action="#" method="POST">
                                @csrf

                                <div class="row g-3 mb-3">
                                    <div class="col-md-6 text-start">
                                        <label for="name"
                                            class="form-label fw-semibold text-secondary small text-uppercase">Name</label>
                                        <input type="text" class="form-control bg-white border-secondary border-opacity-25"
                                            id="name" name="name" placeholder="Enter your name here" required>
                                    </div>

                                    <div class="col-md-6 text-start">
                                        <label for="email"
                                            class="form-label fw-semibold text-secondary small text-uppercase">Email</label>
                                        <input type="email" class="form-control bg-white border-secondary border-opacity-25"
                                            id="email" name="email" placeholder="Enter email here"
                                            value="{{ old('email') }}" required>
                                    </div>
                                </div>

                                <div class="mb-4 text-start">
                                    <label for="content"
                                        class="form-label fw-semibold text-secondary small text-uppercase">Message</label>
                                    <textarea class="form-control bg-white border-secondary border-opacity-25" id="content"
                                        name="content" rows="5" placeholder="Write your message here..."
                                        required></textarea>
                                </div>

                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('web.about') }}" class="btn btn-outline-secondary">
                                        Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary px-4">
                                        Send Message
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 d-flex flex-column gap-3">
                    <div class="card shadow-sm border border-secondary border-opacity-10 bg-white bg-opacity-75">
                        <div class="card-body p-4">
                            <h6 class="fw-bold text-dark mb-3">Contact Information</h6>

                            <div class="d-flex align-items-start gap-3 mb-3">
                                <div class="rounded bg-primary-subtle text-primary p-2 flex-shrink-0">
                                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                                    </svg>
                                </div>
                                <div>
                                    <small class="text-uppercase text-secondary fw-bold d-block"
                                        style="font-size: 0.7rem; letter-spacing: 0.05em;">Email</small>
                                    <span class="fw-semibold text-dark small text-break">contact@rtcl.example.com</span>
                                </div>
                            </div>

                            <div class="d-flex align-items-start gap-3 mb-3">
                                <div class="rounded bg-primary-subtle text-primary p-2 flex-shrink-0">
                                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                                    </svg>
                                </div>
                                <div>
                                    <small class="text-uppercase text-secondary fw-bold d-block"
                                        style="font-size: 0.7rem; letter-spacing: 0.05em;">Phone</small>
                                    <span class="fw-semibold text-dark small">+63 900 000 0000</span>
                                </div>
                            </div>

                            <div class="d-flex align-items-start gap-3">
                                <div class="rounded bg-primary-subtle text-primary p-2 flex-shrink-0">
                                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                                    </svg>
                                </div>
                                <div>
                                    <small class="text-uppercase text-secondary fw-bold d-block"
                                        style="font-size: 0.7rem; letter-spacing: 0.05em;">Office</small>
                                    <span class="fw-semibold text-dark small">Olongapo City</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card flex-fill shadow-sm border border-secondary border-opacity-10 bg-white bg-opacity-75">
                        <div class="card-body p-4 d-flex flex-column justify-content-center">
                            <span
                                class="badge bg-success-subtle text-success border border-success-subtle align-self-start mb-2">
                                Support Hours
                            </span>
                            <h6 class="fw-bold text-dark mb-1">Monday to Friday</h6>
                            <p class="text-secondary small mb-0">
                                8:00 AM to 5:00 PM (PHT). Inquiries submitted outside office hours are answered the next
                                business day.
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
            background-color: seashell;
        }
    </style>
@endsection
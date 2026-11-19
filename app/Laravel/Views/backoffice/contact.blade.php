@extends('backoffice._layouts.main')

@section('content')
    <main class="flex-fill py-4 py-md-5">
        <div class="container" style="max-width: 960px;">

            <div
                class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 pb-4 mb-4 border-bottom">
                <div>
                    <h1 class="h3 fw-bold text-dark mb-1">Contact Us CMS</h1>
                    <p class="text-secondary small mb-0">Manage your public contact details and review submitted inquiries.
                    </p>
                </div>
                <div>
                    <a href="{{ route('web.contact') }}" target="_blank" class="btn btn-outline-dark btn-sm px-3">
                        Preview Contact Page &#8599;
                    </a>
                </div>
            </div>

            <div class="card border shadow-none rounded-3 bg-white mb-4">
                <div class="card-header bg-white border-bottom py-3 px-4">
                    <h2 class="h6 fw-bold text-dark mb-0">Public Contact Details</h2>
                </div>

                <form action="#" method="POST">
                    @csrf
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <label for="contact-heading" class="form-label fw-bold text-secondary">Contact Page
                                Heading</label>
                            <input type="text" class="form-control form-control-lg" id="contact-heading"
                                name="contact-heading"
                                value="{{ old('contact-heading', $contact['heading'] ?? 'Contact us') }}" required>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="support-email" class="form-label fw-bold text-secondary">Support Email</label>
                                <input type="email" class="form-control" id="support-email" name="support-email"
                                    value="{{ old('support-email', $contact['support_email'] ?? 'contact@rtcl.example.com') }}"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="phone-number" class="form-label fw-bold text-secondary">Phone Number</label>
                                <input type="text" class="form-control" id="phone-number" name="phone-number"
                                    value="{{ old('phone-number', $contact['phone_number'] ?? '+63 900 000 0000') }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="office-address" class="form-label fw-bold text-secondary">Office Address</label>
                            <textarea class="form-control" id="office-address" name="office-address" rows="2"
                                placeholder="Olongapo City">{{ old('office-address', $contact['office_address'] ?? 'Olongapo City') }}</textarea>
                        </div>

                        <div class="mb-0">
                            <label for="closing-note" class="form-label fw-bold text-secondary">Form Closing Note</label>
                            <input type="text" class="form-control" id="closing-note" name="closing-note"
                                value="{{ old('closing-note', $contact['closing_note'] ?? 'Thank you for contacting us. We will get back to you as soon as possible.') }}">
                        </div>
                    </div>

                    <div
                        class="card-footer bg-white py-3 px-4 d-flex flex-wrap gap-2 justify-content-between align-items-center">
                        <small class="text-body-secondary">Last updated just now</small>
                        <div class="d-flex gap-2 ms-auto">
                            <a href="{{ route('portal.dashboard') }}" class="btn btn-outline-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card border shadow-none rounded-3 bg-white">
                <div class="card-header bg-white border-bottom py-3 px-4 d-flex justify-content-between align-items-center">
                    <h2 class="h6 fw-bold text-dark mb-0">Recent Form Inquiries</h2>
                    <span class="badge bg-light text-secondary border">{{ count($inquiries ?? []) }} Messages</span>
                </div>

                <div class="list-group list-group-flush">
                    @forelse ($inquiries ?? [] as $inquiry)
                        <div class="list-group-item px-4 py-3 {{ $loop->last ? 'border-bottom-0' : '' }}">
                            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-1">
                                <div>
                                    <span class="fw-bold text-dark small">{{ $inquiry['name'] }}</span>
                                    <span class="text-secondary small ms-1">&lt;{{ $inquiry['email'] }}&gt;</span>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <span
                                        class="badge {{ $inquiry['status'] === 'Unread' ? 'bg-primary-subtle text-primary border border-primary-subtle' : 'bg-light text-secondary border' }}">
                                        {{ $inquiry['status'] }}
                                    </span>
                                    <small class="text-secondary">{{ $inquiry['received_at'] }}</small>
                                </div>
                            </div>
                            <p class="text-secondary small mb-0">{{ $inquiry['message'] }}</p>
                        </div>
                    @empty
                        <div class="p-4 text-center text-secondary small">
                            No inquiries submitted yet.
                        </div>
                    @endforelse
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

@section('page-scripts')
@endsection
@extends('backoffice._layouts.main')

@section('content')
    <main class="flex-fill py-5">
        <div class="container" style="max-width: 900px;">
            <div class="mb-4">
                <h1 class="display-5 fw-bold text-dark mb-2">About Us CMS</h1>
                <p class="lead text-secondary">Manage the information and story shown on your public About page.</p>
            </div>

            <div class="card shadow-sm">
                <form action="#" method="POST">
                    @csrf
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <label for="about-title" class="form-label fw-bold text-secondary">Page Title</label>
                            <input type="text" class="form-control form-control-lg" id="about-title" name="about-title"
                                placeholder="About Rtcl" required>
                        </div>

                        <div class="mb-3">
                            <label for="about-story" class="form-label fw-bold text-secondary">Our Story / Main
                                Content</label>
                            <textarea class="form-control" id="about-story" name="about-story" rows="5"
                                placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi congue enim sed tempor commodo. Vestibulum eros magna, semper id vehicula eget, feugiat in lorem."
                                required></textarea>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="mission-statement" class="form-label fw-bold text-secondary">Mission
                                    Statement</label>
                                <textarea class="form-control" id="mission-statement" name="mission-statement" rows="4"
                                    placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit."></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="vision-statement" class="form-label fw-bold text-secondary">Vision
                                    Statement</label>
                                <textarea class="form-control" id="vision-statement" name="vision-statement" rows="4"
                                    placeholder="Suspendisse pharetra mollis libero sed facilisis."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-white py-3 px-4 d-flex justify-content-between align-items-center">
                        <small class="text-body-secondary">Last updated just now</small>
                        <div class="d-flex gap-2">
                            <a href="{{ route('portal.dashboard') }}" class="btn btn-outline-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                        </div>
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
@extends('portal._layouts.main')

@section('content')
    <main class="flex-fill py-5">
        <div class="container" style="max-width: 900px;">
            <div class="mb-4">
                <h1 class="display-5 fw-bold text-dark mb-2">Home Page CMS</h1>
                <p class="lead text-secondary">Customize the landing hero section and featured graphic displayed to
                    visitors.</p>
            </div>

            <div class="card shadow-sm">
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <label for="hero-title" class="form-label fw-bold text-secondary">Hero Headline</label>
                            <input type="text" class="form-control form-control-lg" id="hero-title" name="hero-title"
                                placeholder="Welcome to Rtcl" required>
                        </div>

                        <div class="mb-3">
                            <label for="hero-description" class="form-label fw-bold text-secondary">Introductory
                                Text</label>
                            <textarea class="form-control bg-white bg-opacity-75 border-secondary border-opacity-25"
                                id="hero-description" name="hero-description" rows="5"
                                placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi congue enim sed tempor commodo. Vestibulum eros magna, semper id vehicula eget, feugiat in lorem."
                                required></textarea>
                        </div>

                        <div class="mb-2">
                            <label for="hero-image" class="form-label fw-bold text-secondary">Right-Side Featured
                                Graphic</label>
                            <input type="file"
                                class="form-control bg-white bg-opacity-75 border-secondary border-opacity-25"
                                id="hero-image" name="hero-image" accept="image/*">
                            <div class="form-text">Current graphic: home1.svg</div>
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
            background-color: aliceblue;
        }
    </style>
@endsection

@section('page-scripts')
@endsection
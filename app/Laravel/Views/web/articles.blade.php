@extends('web._layouts.main')

@section('content')
    <main class="flex-fill py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 720px;">
                <p class="text-uppercase text-primary fw-semibold small mb-1" style="letter-spacing: 0.05em;">Publications
                </p>
                <h1 class="display-5 fw-bold text-dark mb-3">Rtcl Articles</h1>
                <p class="lead text-secondary mb-0">
                    Explore our collection of published articles, tutorials, and editorial stories curated for readers and
                    contributors.
                </p>
            </div>

            <div class="row g-4">
                @forelse ($articles as $article)
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="card h-100 text-start shadow-sm border-0">
                            <a href="{{ route('web.article', $article['id']) }}"
                                class="ratio ratio-4x3 bg-light overflow-hidden rounded-top">
                                <img src="{{ asset($article['image']) }}" class="w-100 h-100 object-fit-cover"
                                    alt="{{ $article['title'] }}">
                            </a>
                            <div class="card-body d-flex flex-column p-4">
                                <div class="d-flex align-items-center justify-content-between text-muted small mb-2">
                                    <span class="badge bg-primary-subtle text-primary">Editorial</span>
                                    <span>{{ $article['published_at'] ?? 'June 10, 2026' }}</span>
                                </div>
                                <h5 class="card-title fw-bold text-dark mb-2">{{ $article['title'] }}</h5>
                                <p class="card-text text-secondary small mb-4 flex-grow-1">
                                    {{ Str::limit($article['summary'], 125) }}
                                </p>
                                <a href="{{ route('web.article', $article['id']) }}" class="btn btn-primary w-100 mt-auto">
                                    Go to article
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="card border-0 shadow-sm text-center py-5">
                            <div class="card-body">
                                <h5 class="fw-bold text-dark mb-1">No articles found</h5>
                                <p class="text-secondary small mb-3">Try clearing your search filter or check back later.</p>
                                <a href="{{ route('web.articles') }}" class="btn btn-outline-primary btn-sm">Reset Search</a>
                            </div>
                        </div>
                    </div>
                @endforelse
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
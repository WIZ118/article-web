@extends('web._layouts.main')

@section('content')
    <main class="flex-fill d-flex align-items-center justify-content-center" style="min-height: 75vh;">
        <div class="container py-5">
            <div class="row align-items-center gy-5">
                <div class="col-md-6 text-center text-md-start">
                    <span
                        class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 rounded-pill mb-3">
                        {{ $home?->badge_text ?: 'Editorial & Knowledge Hub' }}
                    </span>
                    <h1 class="display-4 fw-bold mb-3 text-dark">{{ $home->title ?? 'Welcome to Rtcl' }}</h1>
                    @if (!empty($home?->content))
                        <div class="lead text-secondary mb-4">{!! $home->content !!}</div>
                    @else
                        <p class="lead text-secondary mb-4">
                            Discover well-crafted articles, practical guides, and curated insights built for curious readers.
                            Browse featured stories, explore topics in depth, and stay connected with our growing community.
                        </p>
                    @endif
                    <div class="d-flex flex-wrap justify-content-center justify-content-md-start gap-2">
                        <a href="{{ route('web.articles') }}" class="btn btn-primary btn-lg px-4 shadow-sm">
                            {{ $home?->primary_button_label ?: 'Go to Articles' }}
                        </a>
                        <a href="{{ route('web.about') }}" class="btn btn-outline-secondary btn-lg px-4">
                            {{ $home?->secondary_button_label ?: 'Learn More' }}
                        </a>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <img src="{{ asset('assets/images/home1.svg') }}" alt="Home Page Graphic" class="img-fluid">
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-end mt-5 pt-3 border-top">
                <div>
                    <p class="text-uppercase text-primary fw-semibold small mb-1" style="letter-spacing: 0.05em;">
                        {{ $home?->featured_label ?: 'Featured' }}
                    </p>
                    <h2 class="h4 fw-bold text-dark mb-0">
                        {{ $home?->featured_title ?: 'Latest Articles' }}
                    </h2>
                </div>
                <a href="{{ route('web.articles') }}" class="text-decoration-none fw-semibold small">
                    {{ $home?->featured_link_label ?: 'View all articles' }} &rarr;
                </a>
            </div>

            <div class="row g-4 mt-2">
                @foreach ($articles as $article)
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card h-100 text-start shadow-sm border-0">
                            <a href="{{ route('web.article', $article['route_id'] ?? $article['id']) }}"
                                class="ratio ratio-4x3 bg-light overflow-hidden rounded-top">
                                <img src="{{ asset(!empty($article['image']) ? $article['image'] : 'assets/images/home1.svg') }}"
                                    class="w-100 h-100 object-fit-cover" alt="{{ $article['title'] }}">
                            </a>
                            <div class="card-body d-flex flex-column">
                                <div class="d-flex align-items-center justify-content-between text-muted small mb-2">
                                    <span class="badge bg-primary-subtle text-primary">Article</span>
                                    <span>3 min read</span>
                                </div>
                                <h5 class="card-title fw-bold text-dark">{{ $article['title'] }}</h5>
                                <p class="card-text text-secondary small mb-3 flex-grow-1">
                                    {{ Str::limit($article['summary'], 110) }}
                                </p>
                                <a href="{{ route('web.article', $article['route_id'] ?? $article['id']) }}"
                                    class="btn btn-sm btn-outline-primary w-100 mt-auto">
                                    Read Article
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
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
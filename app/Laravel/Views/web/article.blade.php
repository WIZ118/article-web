@extends('web._layouts.main')

@section('content')
    <main class="flex-fill py-5" style="min-height: 78vh;">
        <div class="container" style="max-width: 920px;">
            <article class="card border-0 shadow-sm overflow-hidden mb-4">
                <div class="card-body p-4 p-md-5">
                    <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-1">
                            Featured Article
                        </span>
                        <span class="text-muted small">5 min read</span>
                    </div>

                    <h1 class="display-6 fw-bold text-dark mb-3">{{ $article['title'] ?? 'Article Title' }}</h1>

                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 pb-4 mb-4 border-bottom">
                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-circle bg-primary-subtle text-primary fw-bold d-flex align-items-center justify-content-center flex-shrink-0"
                                style="width: 42px; height: 42px;">
                                {{ strtoupper(substr($article['author'] ?? 'J', 0, 1)) }}
                            </div>
                            <div>
                                <div class="fw-semibold text-dark small">{{ $article['author'] ?? 'John Doe' }}</div>
                                <div class="text-muted small">
                                    Published on {{ $article['published_at'] ?? 'June 10, 2026' }}
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-light text-secondary border">Editorial</span>
                            <span class="badge bg-light text-secondary border">Rtcl Insights</span>
                        </div>
                    </div>

                    <div class="ratio ratio-16x9 bg-light rounded border overflow-hidden mb-4">
                        <img src="{{ asset($article['image'] ?? 'assets/images/home1.svg') }}"
                            alt="{{ $article['title'] ?? 'Article Image' }}" class="w-100 h-100 object-fit-contain p-4">
                    </div>

                    <div class="text-secondary fs-6" style="line-height: 1.85;">
                        @if (!empty($article['summary']))
                            <p class="lead text-dark fw-normal mb-4">
                                {{ $article['summary'] }}
                            </p>
                        @endif

                        @if (!empty($article['content']))
                            <p class="mb-4">{{ $article['content'] }}</p>
                        @endif

                        <p class="mb-4">
                            Digital publishing works best when ideas are presented with clarity, structure, and visual
                            balance. Across modern editorial platforms, readers increasingly look for well-organized
                            articles that break down complex subjects into digestible sections without sacrificing depth.
                        </p>

                        <h4 class="fw-bold text-dark mt-4 mb-3">Why Structured Content Matters</h4>
                        <p class="mb-4">
                            When articles follow a consistent layout—pairing descriptive headings, focused paragraphs, and
                            clear visual hierarchy—readers can scan key takeaways effortlessly and return to reference
                            details whenever needed. This approach benefits both casual visitors and regular subscribers.
                        </p>

                        <blockquote class="border-start border-4 border-primary ps-3 py-2 my-4 bg-light rounded-end">
                            <p class="mb-0 fst-italic text-dark">
                                "Great editorial design removes friction between the writer's insight and the reader's
                                understanding."
                            </p>
                        </blockquote>

                        <h4 class="fw-bold text-dark mt-4 mb-3">Looking Ahead</h4>
                        <p class="mb-0">
                            As Rtcl continues to grow, contributors and editors can collaborate seamlessly to publish
                            timely stories, practical guides, and curated insights tailored to an engaged readership.
                        </p>
                    </div>

                    <div
                        class="p-3 p-md-4 bg-light rounded border mt-4 d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-circle bg-primary text-white fw-bold d-flex align-items-center justify-content-center flex-shrink-0"
                                style="width: 46px; height: 46px;">
                                {{ strtoupper(substr($article['author'] ?? 'J', 0, 1)) }}
                            </div>
                            <div>
                                <div class="text-uppercase text-muted fw-bold small"
                                    style="font-size: 0.7rem; letter-spacing: 0.05em;">
                                    Written By
                                </div>
                                <div class="fw-bold text-dark">{{ $article['author'] ?? 'John Doe' }}</div>
                                <div class="text-muted small">Contributor at Rtcl Editorial Team</div>
                            </div>
                        </div>

                        <a href="{{ route('web.articles') }}"
                            class="btn btn-outline-primary d-inline-flex align-items-center justify-content-center gap-2">
                            <svg width="15" height="15" fill="currentColor" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                            </svg>
                            <span>Return to articles</span>
                        </a>
                    </div>
                </div>
            </article>
        </div>
    </main>
@endsection

@section('page-styles')
    <style>
        body {
            background-color: floralwhite;
        }
    </style>
@endsection
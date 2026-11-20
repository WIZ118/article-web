@extends('web._layouts.main')

@section('content')
    <main class="flex-fill d-flex align-items-center justify-content-center">
        <div class="container text-center py-5">

            <h1 class="display-4 fw-bold mb-3 text-dark">Rtcls</h1>
            <p class="lead text-secondary mb-5">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi congue enim sed tempor commodo. Vestibulum
                eros magna, semper id vehicula eget, feugiat in lorem. Fusce orci nunc, auctor rhoncus sollicitudin quis,
                molestie ac dui. Suspendisse pharetra mollis libero sed facilisis. Suspendisse semper, ante non dictum
                convallis, risus tellus blandit sapien, id mollis arcu metus nec leo.
            </p>

            <div class="row row-cols-1 row-cols-md-3 g-4 mb-4">

                @forelse ($articles as $article)
                    <div class="col">
                        <div class="card article-card h-100 text-start">
                            <img src="{{ asset($article['image']) }}" class="card-img-top article-card-image"
                                alt="{{ $article['title'] }} thumbnail">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title article-card-title">{{ $article['title'] }}</h5>
                                <p class="card-text article-card-summary flex-grow-1">{{ $article['summary'] }}</p>
                                <a href="{{ route('web.article', $article['id']) }}" class="btn btn-primary mt-auto">Go to article</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-secondary mb-0">No articles matched your search.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </main>
@endsection

@section('page-styles')
    <style>
        body {
            background-color: ghostwhite;
        }

        .article-card {
            min-height: 390px;
        }

        .article-card-image {
            width: 100%;
            height: 190px;
            object-fit: cover;
            object-position: center;
        }

        .article-card-title {
            min-height: 24px;
        }

        .article-card-summary {
            min-height: 72px;
        }

        @media (min-width: 768px) {
            .article-card-image {
                height: 210px;
            }
        }
    </style>
@endsection

@section('page-scripts')
    <style>
        body {
            background-color: ghostwhite;
        }
    </style>
@endsection
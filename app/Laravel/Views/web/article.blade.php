@extends('web._layouts.main')

@section('content')
    <main class="flex-fill py-5" style="min-height: 85vh;">
        <div class="container" style="max-width: 1000px;">

            <div class="mb-4 text-end">
                <h1 class="display-5 fw-bold text-dark">Welcome to Article page</h1>
            </div>

            <div class="row align-items-start gy-4 mb-4">

                <div class="col-md-5">
                    <img src="{{ asset('assets/images/article1.jpg') }}" alt="Article Cover"
                        class="img-fluid rounded shadow-sm w-100" style="object-fit: cover;">
                </div>

                <div class="col-md-7">
                    <div class="article-content text-secondary" style="line-height: 1.8;">
                        <p class="lead">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi congue enim sed tempor commodo.
                            Vestibulum eros magna, semper id vehicula eget, feugiat in lorem. Fusce orci nunc, auctor
                            rhoncus sollicitudin quis, molestie ac dui. Suspendisse pharetra mollis libero sed facilisis.
                            Suspendisse semper, ante non dictum convallis, risus tellus blandit sapien, id mollis arcu metus
                            nec leo.
                        </p>
                        <p>
                            Author: John Doe | Published on: {{ date('F j, Y', strtotime('2026-06-10')) }}
                        </p>
                    </div>
                </div>

            </div>

            <div class="row mt-2">
                <div class="col-12 d-flex justify-content-end">
                    <a href="{{ route('web.articles') }}" class="btn btn-outline-primary px-4 shadow-sm">
                        &larr; Return to articles page
                    </a>
                </div>
            </div>

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

@section('page-scripts')
    <style>
        body {
            background-color: floralwhite;
        }
    </style>
@endsection
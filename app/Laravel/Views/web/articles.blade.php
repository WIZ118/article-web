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

                {{-- 1st article --}}

                <div class="col">
                    <div class="card h-100 text-start">
                        <img src="{{asset('assets/images/article1.jpg')}}" class="card-img-top" alt="Article 1 thumbnail">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Article 1</h5>
                            <p class="card-text flex-grow-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi
                                congue enim sed tempor commodo. Vestibulum eros magna, semper id vehicula eget, feugiat in
                                lorem.</p>
                            <a href="{{ route('web.article') }}" class="btn btn-primary mt-auto">Go to article</a>
                        </div>
                    </div>
                </div>

                {{-- 2nd article --}}

                <div class="col">
                    <div class="card h-100 text-start">
                        <img src="{{asset('assets/images/article2.jpg')}}" class="card-img-top" alt="Article 2 thumbnail">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Article 2</h5>
                            <p class="card-text flex-grow-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi
                                congue enim sed tempor commodo. Vestibulum eros magna, semper id vehicula eget, feugiat in
                                lorem.</p>
                            <a href="{{ route('web.article') }}" class="btn btn-primary mt-auto">Go to article</a>
                        </div>
                    </div>
                </div>

                {{-- 3rd article --}}

                <div class="col">
                    <div class="card h-100 text-start">
                        <img src="{{asset('assets/images/article3.jpg')}}" class="card-img-top" alt="Article 3 thumbnail">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Article 3</h5>
                            <p class="card-text flex-grow-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi
                                congue enim sed tempor commodo. Vestibulum eros magna, semper id vehicula eget, feugiat in
                                lorem.</p>
                            <a href="{{ route('web.article') }}" class="btn btn-primary mt-auto">Go to article</a>
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
            background-color: ghostwhite;
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
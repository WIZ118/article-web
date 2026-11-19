@extends('web._layouts.main')

@section('content')
    <main class="flex-fill d-flex align-items-center justify-content-center" style="min-height: 75vh;">
        <div class="container py-5">
            <div class="row align-items-center gy-5">
                <div class="col-md-6 text-center text-md-start">
                    <h1 class="display-4 fw-bold mb-3 text-dark">Welcome to Rtcl</h1>
                    <p class="lead text-secondary mb-4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi congue enim sed tempor commodo.
                        Vestibulum eros magna, semper id vehicula eget, feugiat in lorem. Fusce orci nunc, auctor rhoncus
                        sollicitudin quis, molestie ac dui. Suspendisse pharetra mollis libero sed facilisis. Suspendisse
                        semper, ante non dictum convallis, risus tellus blandit sapien, id mollis arcu metus nec leo.
                    </p>
                    <div>
                        <a href="{{ route('web.articles') }}" class="btn btn-primary btn-lg">
                            Go to Articles
                        </a>
                    </div>
                </div>

                <div class="col-md-6 text-center">
                    <img src="{{ asset('assets/images/home1.svg') }}" alt="Home Page Graphic" class="img-fluid">
                </div>


                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card h-100 text-start">
                        <a href="{{ route('web.article') }}">
                            <img src="{{ asset('assets/images/article1.jpg') }}" class="card-img-top" alt="article 1"
                                class="img-fluid">
                        </a>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Article 1</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi congue enim
                                sed tempor commodo.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-body-secondary">Uploaded 3 mins ago</small>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card h-100 text-start">
                        <a href="{{ route('web.article') }}">
                            <img src="{{ asset('assets/images/article2.jpg') }}" class="card-img-top" alt="article 2"
                                class="img-fluid">
                        </a>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Article 2</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi congue enim
                                sed tempor commodo.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-body-secondary">Uploaded 4 mins ago</small>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card h-100 text-start">
                        <a href="{{ route('web.article') }}">
                            <img src="{{ asset('assets/images/article3.jpg') }}" class="card-img-top" alt="article 3"
                                class="img-fluid">
                        </a>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Article 3</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi congue enim
                                sed tempor commodo.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-body-secondary">Uploaded 6 mins ago</small>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card h-100 text-start">
                        <a href="{{ route('web.article') }}">
                            <img src="{{ asset('assets/images/article5.jpg') }}" class="card-img-top" alt="article 5"
                                class="img-fluid">
                        </a>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Article 5</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi congue enim
                                sed tempor commodo.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-body-secondary">Uploaded 7 mins ago</small>
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
            background-color: aliceblue;
        }
    </style>
@endsection

@section('page-scripts')
    <style>
        body {
            background-color: aliceblue;
        }
    </style>
@endsection
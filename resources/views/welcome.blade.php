<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sydney</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="">

{{-- Login method for user / dashboard (breeze default) --}}
{{-- navbar start--}}
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Sydney</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#Features">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <div>
                @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                        @auth
                            <a class="btn btn-primary" href="{{ url('/dashboard') }}" class="">Dashboard</a>
                        @else
                            <a class="btn btn-primary" href="{{ route('login') }}" class="">Log in</a>

                            @if (Route::has('register'))
                                <a class="btn btn-primary" href="{{ route('register') }}" class="">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>

        </div>
    </div>
</nav>
{{--navbar end--}}
{{-- Login method for user / dashboard end here --}}
{{--header start--}}
<header class="header-section">

    <!-- Video Background -->
    <video autoplay muted loop>
        <source src="{{asset('media/video-header-01.mp4')}}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <!-- Header Content -->
    <div class="header-content text-center">
        <h1>Welcome To Sydney v0.5</h1>
        <p>Simplifying HR management for a better workplace</p>
        <p>*this is a beta version of Sydney</p>
        <a href="#" class="btn btn-primary">Get Started</a>
    </div>
</header>
{{--herder end--}}
<!-- Section for summery start -->

<section class="py-5 bg-light">
    <div class="container">
        <h1 class="text-center">#SummrySection</h1>
        <h4 class="text-center">Manage , analyze , improve , grow up !</h4>
    </div>
    <div class="container">
        <h2>not the only one but the best</h2>
        <p>Take your HR management system to the next level with Sydney! Enjoy a modern, user-friendly design, a sleek interface, exciting new features, and much more!</p>
        <a href="#" class="btn btn-primary">Learn more here</a>
    </div>
</section>
<!-- Section for summery end -->

<!-- Section for Cards start -->
<section id="Features" class="container py-5">
    <h2 class="text-center mb-4">Our Features</h2>
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <img src="feature1.jpg" class="card-img-top" alt="Feature 1">
                <div class="card-body">
                    <h5 class="card-title">Feature 1</h5>
                    <p class="card-text">Brief description of Feature 1.</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <img src="feature2.jpg" class="card-img-top" alt="Feature 2">
                <div class="card-body">
                    <h5 class="card-title">Feature 2</h5>
                    <p class="card-text">Brief description of Feature 2.</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <img src="feature3.jpg" class="card-img-top" alt="Feature 3">
                <div class="card-body">
                    <h5 class="card-title">Feature 3</h5>
                    <p class="card-text">Brief description of Feature 3.</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <img src="feature4.jpg" class="card-img-top" alt="Feature 4">
                <div class="card-body">
                    <h5 class="card-title">Feature 4</h5>
                    <p class="card-text">Brief description of Feature 4.</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <img src="feature5.jpg" class="card-img-top" alt="Feature 5">
                <div class="card-body">
                    <h5 class="card-title">Feature 5</h5>
                    <p class="card-text">Brief description of Feature 5.</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <img src="feature6.jpg" class="card-img-top" alt="Feature 6">
                <div class="card-body">
                    <h5 class="card-title">Feature 6</h5>
                    <p class="card-text">Brief description of Feature 6.</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section for Cards end -->









<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

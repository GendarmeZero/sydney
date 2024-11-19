@extends('landing-page.layouts.master')

@section('content')
    <div class="container mt-5">
        <!-- Header Section -->
        <div class="text-center mb-4">
            <h1 class="display-4 font-weight-bold">About Us</h1>
            <p class="lead text-muted">Learn more about who we are and what we stand for.</p>
        </div>

        <!-- Media Card Section with Video -->
        <div class="row align-items-center mb-5">
            <!-- Left Card with Video -->
            <div class="col-md-6">
                <div class="card media-card">
                    <video src="{{ asset('assets/video/video-header-01.mp4') }}?v={{ time() }}" class="card-img-top" autoplay loop muted></video>
                </div>
            </div>

            <!-- Text Section on the Right -->
            <div class="col-md-6">
                <h2>Not the Only One, But the Best</h2>
                <p>Take your HR management system to the next level with Sydney! Enjoy a modern, user-friendly design, a sleek interface, exciting new features, and much more!</p>
                <p class="mb-5">Sydney is designed to help HR departments work more efficiently. From recruitment to payroll, employee management, performance reviews, and analytics, Sydney covers all aspects of HR with ease and precision.</p>
                <a href="#" class="explore-btn summary-sub-title">Learn More</a>
            </div>
        </div>

        <!-- Content Section for Cards -->
        <div class="row">
            <!-- Card 1: Mission -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <i class="fas fa-bullseye fa-3x text-primary mb-3"></i>
                        <h5 class="card-title font-weight-bold">Our Mission</h5>
                        <p class="card-text text-muted">
                            To empower individuals and organizations with seamless HR solutions that inspire growth.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Card 2: Vision -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <i class="fas fa-eye fa-3x text-success mb-3"></i>
                        <h5 class="card-title font-weight-bold">Our Vision</h5>
                        <p class="card-text text-muted">
                            To be a global leader in innovative and reliable HR management systems.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Card 3: Values -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <i class="fas fa-handshake fa-3x text-warning mb-3"></i>
                        <h5 class="card-title font-weight-bold">Our Values</h5>
                        <p class="card-text text-muted">
                            Integrity, Innovation, and Inclusion drive everything we do.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Image Slider Section -->
        <div class="row mt-5">
            <div class="col-md-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('assets/img/slider/slider-1.jpg') }}" class="d-block w-100 slider-image" alt="Slider Image 1">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/img/slider/slider-2.jpg') }}" class="d-block w-100 slider-image" alt="Slider Image 2">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/img/slider/slider-3.jpg') }}" class="d-block w-100 slider-image" alt="Slider Image 3">
                        </div>
                    </div>
                    <!-- Left and Right Arrow Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-primary" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-primary" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Additional Info Section -->
        <div class="row mt-5">
            <div class="col-md-6">
                <h4 class="font-weight-bold">Who We Are</h4>
                <p class="text-muted">
                    We are a team of passionate individuals dedicated to simplifying HR management for companies worldwide.
                </p>
            </div>
            <div class="col-md-6">
                <h4 class="font-weight-bold">What We Do</h4>
                <p class="text-muted">
                    From employee management to resume tracking, our solutions ensure efficiency and scalability for businesses of all sizes.
                </p>
            </div>
        </div>
    </div>

<!-- Add this CSS to style the slider -->
    <style>
        .slider-image {
            border: 2px solid #ddd; /* Add border around images */
            max-height: 400px; /* Limit height to 200px */
            object-fit: cover; /* Ensure images cover the available space */
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: #f39c12; /* Change arrow color to a more vibrant one (yellow) */
            border-radius: 50%; /* Make arrows circular */
            padding: 10px; /* Increase size of arrows */
        }

        .carousel-control-prev-icon:hover,
        .carousel-control-next-icon:hover {
            background-color: #e67e22; /* Darker yellow for hover effect */
        }
    </style>
@endsection

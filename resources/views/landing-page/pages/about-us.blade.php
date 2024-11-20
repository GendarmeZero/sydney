@extends('landing-page.layouts.master')

@section('content')
    <div class="container mt-5">
        <!-- Header Section -->
        <div class="text-center mb-5">
            <h1 class="display-1 font-weight-bold">About Us</h1>
            <p class="lead text-muted">Learn more about the vision behind Sydney and the people driving it forward.</p>
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
                <h2>Our Vision and Story</h2>
                <p>Sydney was born out of a passion for empowering businesses with smarter HR solutions. As the owner and creator of Sydney, our goal is to revolutionize HR management through innovative tools that streamline processes, enhance employee experiences, and improve decision-making.</p>
                <p class="mb-5">Our vision is to create an ecosystem where companies, no matter their size, can leverage the power of technology to elevate their human resources to new heights. Sydney is designed to be more than just a system – it’s a platform that grows with you and adapts to the ever-changing needs of the workforce.</p>
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

        <!-- New Cards Section for Who We Are and What We Do -->
        <div class="row mb-5">
            <!-- Who We Are Card -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <i class="fas fa-users fa-3x text-info mb-3"></i>
                        <h5 class="card-title font-weight-bold">Who We Are</h5>
                        <p class="card-text text-muted">
                            We are a team of passionate individuals dedicated to simplifying HR management for companies worldwide.
                        </p>
                    </div>
                </div>
            </div>

            <!-- What We Do Card -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <i class="fas fa-cogs fa-3x text-danger mb-3"></i>
                        <h5 class="card-title font-weight-bold">What We Do</h5>
                        <p class="card-text text-muted">
                            From employee management to resume tracking, our solutions ensure efficiency and scalability for businesses of all sizes.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Image Slider Section -->
        <div class="row mt-7">
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
    </div>
    <!-- New Cards Section for Who We Are and What We Do -->
    <div class="row mb-5">





    <!-- Add this CSS to style the slider -->
    <style>
        .slider-image {
            border: 2px solid #ddd; /* Add border around images */
            height: 450px; /* Increased height for the slider images */
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

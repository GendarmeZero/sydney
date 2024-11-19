@extends('landing-page.layouts.master')

@section('title', 'Home')

@section('content')
    <header class="header-section" id="section-header">
        <!-- Video Background -->
        <video autoplay muted loop>
            <source src="{{ asset('assets/video/video-header-01.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <!-- Header Content -->
        <div class="header-content text-center">
            <h1>Welcome To Sydney</h1>
            <p>Simplifying HR management for a better workplace</p>
            <a href="#summary" class="main-btn btn-primary ">Get Started</a>

        </div>
    </header>




    {{-- Summary Section --}}
    @include('landing-page.layouts.summary')

    {{-- Summary Section --}}
    @include('landing-page.layouts.clients')

    {{-- Features Section --}}
    @include('landing-page.layouts.features')

@endsection

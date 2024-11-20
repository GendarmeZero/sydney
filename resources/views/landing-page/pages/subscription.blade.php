@extends('landing-page.layouts.master')
<head>
    <link rel="stylesheet" href="{{ asset('css/subscription.css') }}">
</head>

@section('content')
    <div class="container mt-5 pt-5">
        <!-- Header Section -->
        <div class="text-center mb-5">
            <h1 class="display-4 font-weight-bold">Choose Your Plan</h1>
            <p class="lead text-muted">Select a subscription plan that fits your needs and unlock seamless HR solutions.</p>
        </div>

        <!-- Subscription Plans Section -->
        <div class="d-flex justify-content-center align-items-stretch gap-4 mb-5">
            <!-- Standard Plan (Previously Basic, Now Highlighted) -->
            <div class="plan-card text-center standard highlighted">
                <div class="icon-container"><i class="fas fa-users"></i></div>
                <h5 class="plan-title">Standard</h5>
                <p class="plan-description">
                    Perfect for startups or small businesses taking their first step into efficient HR management.
                </p>
                <ul class="plan-features">
                    <li><i class="far fa-check-circle"></i> Basic Reports</li>
                    <li><i class="far fa-check-circle"></i> Employee Management</li>
                    <li><i class="far fa-check-circle"></i> Departments Management</li>
                </ul>
                <h4 class="plan-price">$19/month</h4>
                <form action="{{ route('choose.plan') }}" method="POST">
                    @csrf
                    <input type="hidden" name="plan" value="standard">
                    <button type="submit" class="btn btn-custom mt-3">Choose</button>
                </form>

            </div>

            <!-- Basic Plan (Previously Standard, Centered) -->
            <div class="plan-card text-center basic inactive">
                <div class="coming-soon">Coming Soon</div>
                <div class="icon-container"><i class="fas fa-briefcase"></i></div>
                <h5 class="plan-title">Basic</h5>
                <p class="plan-description">
                    Designed for growing businesses in need of advanced HR features.
                </p>
                <ul class="plan-features">
                    <li><i class="far fa-check-circle"></i> Everything in Standard</li>
                    <li><i class="far fa-check-circle"></i> Custom settings </li>
                    <li><i class="far fa-check-circle"></i> Priority Support</li>
                </ul>
                <h4 class="plan-price">$49/month</h4>
                <a href="#" class="btn btn-custom mt-3">Choose</a>
            </div>

            <!-- Golden Plan -->
            <div class="plan-card text-center golden inactive">
                <div class="coming-soon">Coming Soon</div>
                <div class="icon-container"><i class="fas fa-chart-line"></i></div>
                <h5 class="plan-title">Golden</h5>
                <p class="plan-description">
                    The ultimate plan for enterprises seeking full-scale HR automation and analytics.
                </p>
                <ul class="plan-features">
                    <li><i class="far fa-check-circle"></i> Everything in Basic</li>
                    <li><i class="far fa-check-circle"></i> Advanced Analytics</li>
                    <li><i class="far fa-check-circle"></i> 24/7 Dedicated Support</li>
                    <li><i class="far fa-check-circle"></i>  HR Support and Training</li>
                </ul>
                <h4 class="plan-price">$99/month</h4>
                <a href="#" class="btn btn-custom mt-3">Choose</a>
            </div>
        </div>
    </div>


@endsection

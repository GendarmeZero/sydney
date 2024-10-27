@extends('dashboard.layouts.header')
@include('dashboard.layouts.header')

<body>
<div class="container mt-5">
    <div class="row">
        <!-- Sidebar with User Image -->
        <div class="col-md-4 text-center">
            <div class="card mb-4">
                <img src="{{ asset('path/to/user-image.jpg') }}" alt="User Image" class="card-img-top rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $user->name }}</h5>
                    <p class="card-text">{{ $user->role }}</p>
                </div>
            </div>
        </div>

        <!-- User Information Card -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Profile Information</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
                        <li class="list-group-item"><strong>Phone:</strong> {{ $user->phone }}</li>
                        <li class="list-group-item"><strong>Company:</strong> {{ $user->company }}</li>
                        <li class="list-group-item"><strong>Country:</strong> {{ $user->country }}</li>
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('users.show') }}" class="btn btn-secondary">Back to Users</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

@include('dashboard.layouts.core')

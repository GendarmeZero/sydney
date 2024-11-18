@extends('dashboard.layouts.header')
@include('dashboard.layouts.header')

<body>
@include('dashboard.layouts.side')
@include('dashboard.layouts.nav')

<div class="container mt-5">
    <h1 class="mb-4">Events</h1>
    <a href="{{ route('events.create') }}" class="btn btn-primary mb-4">Create Event</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach($events as $event)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm event-card h-100">
                    <div class="card-body">
                        <h5 class="card-title text-primary">{{ $event->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            Created by: {{ $event->user ? $event->user->name : 'Unknown' }}
                        </h6>
                        <p class="card-text text-truncate" title="{{ $event->description }}">{{ $event->description }}</p>
                        <p class="text-muted"><i class="far fa-calendar-alt"></i> {{ $event->event_date }}</p>
                    </div>
                    <div class="card-footer bg-light">
                        <div class="d-flex justify-content-between mt-2">
                            <a href="{{ route('events.show', $event->id) }}" class="btn btn-outline-info btn-sm fw-bold">
                                <i class="fas fa-eye"></i> View
                            </a>
                            <a href="{{ route('events.edit', $event->id) }}" class="btn btn-outline-warning btn-sm fw-bold">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm fw-bold" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@include('dashboard.layouts.core')

<!-- Custom CSS -->
<style>
    .event-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
    }

    .event-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }
</style>
</body>

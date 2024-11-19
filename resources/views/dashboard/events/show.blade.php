@extends('dashboard.layouts.header')
@include('dashboard.layouts.header')

<body>
@include('dashboard.layouts.side')
@include('dashboard.layouts.nav')

<div class="container mt-5 d-flex justify-content-center">
    <div class="card shadow-lg" style="border-radius: 15px; overflow: hidden; width: 70%;">
        <!-- Header Section -->
        <div class="card-header text-white p-4"
             style="background: linear-gradient(135deg, #4a90e2, #007aff);">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0" style="font-weight: bold;">{{ $event->name }}</h3>
                <div class="text-end">
                    <p class="mb-1">
                        <i class="fas fa-user-circle"></i> <strong>Created By:</strong> {{ $event->user ? $event->user->name : 'Unknown' }}
                    </p>
                    <p class="mb-1">
                        <i class="fas fa-calendar-alt"></i> <strong>Event Date:</strong> {{ $event->event_date->format('F j, Y') }}
                    </p>
                    <p class="mb-0">
                        <i class="fas fa-clock"></i> <strong>Created On:</strong> {{ $event->created_at->format('F j, Y') }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Body Section -->
        <div class="card-body p-5" style="background-color: #f8f9fa;">
            <h4 class="mb-4" style="font-weight: 600;">Event Description</h4>
            <div class="p-4" style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                <p class="text-muted" style="line-height: 1.8; font-size: 1.1rem;">{{ $event->description }}</p>
            </div>
        </div>

        <!-- Footer Section with Action Buttons -->
        <div class="card-footer text-center p-4" style="background-color: #ffffff;">
            <div class="d-flex justify-content-center">
                <a href="{{ route('events.index') }}"
                   class="btn btn-primary"
                   style="background: linear-gradient(135deg, #007aff, #4a90e2); border: none; padding: 10px 30px; border-radius: 50px;">
                    <i class="fas fa-arrow-left"></i> Back to Events
                </a>

                <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="btn btn-danger"
                            style="background: linear-gradient(135deg, #ff6b6b, #ff0000); border: none; padding: 10px 30px; border-radius: 50px; margin-left: 10px;"
                            onclick="return confirm('Are you sure you want to delete this event?')">
                        <i class="fas fa-trash-alt"></i> Delete
                    </button>
                </form>

                <!-- Print Button -->
                <button class="btn btn-outline-primary"
                        style="background-color: white; color: #007aff; border: 2px solid #007aff; padding: 10px 30px; border-radius: 50px; margin-left: 10px;"
                        onmouseover="this.style.backgroundColor='#000000'; this.style.color='white';"
                        onmouseout="this.style.backgroundColor='white'; this.style.color='#007aff';"
                        onclick="window.print();">
                    <i class="fas fa-print"></i> Print Event
                </button>

            </div>
    </div>
</div>

@include('dashboard.layouts.core')

<script>
    // Optional: you can customize the print window settings if necessary
    function printPage() {
        window.print();
    }
</script>
</body>

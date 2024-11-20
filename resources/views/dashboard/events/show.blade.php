@include('dashboard.layouts.header')

<body>
@include('dashboard.layouts.side')
@include('dashboard.layouts.nav')
<div class="container mt-5 d-flex justify-content-center ">
    <div class="card shadow-lg rounded-lg overflow-hidden" style="width: 70%; border: none;">
        <!-- Header Section -->
        <div class="card-header text-white p-4" style="background: linear-gradient(135deg, #e7c584, #5b91c1);">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0" style="font-weight: bold; font-size: 1.6rem;">{{ $event->name }}</h3>
                <div class="text-end">
                    <p class="mb-1 text-light">
                        <i class="fas fa-user-circle"></i> <strong>Created By:</strong> {{ $event->user ? $event->user->name : 'Unknown' }}
                    </p>
                    <p class="mb-1 text-light">
                        <i class="fas fa-calendar-alt"></i> <strong>Event Date:</strong> {{ $event->event_date->format('F j, Y') }}
                    </p>
                    <p class="mb-0 text-light">
                        <i class="fas fa-clock"></i> <strong>Created On:</strong> {{ $event->created_at->format('F j, Y') }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Body Section -->
        <div class="card-body p-5" style="background-color: #f8f9fa;">
            <h4 class="mb-4" style="font-weight: 600; color: #333;">Event Description</h4>
            <div class="p-4" style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
                <p class="text-muted" style="line-height: 1.8; font-size: 1.1rem;">{{ $event->description }}</p>
            </div>
        </div>

        <!-- Footer Section with Action Buttons -->
        <div class="card-footer text-center p-4" style="background-color: #ffffff; border-top: 1px solid #ddd;">
            <div class="d-flex justify-content-center">
                <!-- Back to Events Button -->
                <a href="{{ route('events.index') }}" class="btn btn-primary me-3" style="background: linear-gradient(135deg, #007aff, #4a90e2); border: none; padding: 12px 35px; border-radius: 30px; font-size: 1.1rem;">
                    <i class="fas fa-arrow-left"></i> Back to Events
                </a>

                <!-- Delete Event Form -->
                <form id="delete-event-form" action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="button" id="delete-button" class="btn btn-danger me-3"
                            style="background: linear-gradient(135deg, #ff6b6b, #ff0000); border: none; padding: 12px 35px; border-radius: 30px; font-size: 1.1rem;">
                        <i class="fas fa-trash-alt"></i> Delete
                    </button>
                </form>

                <!-- Print Button -->
                <button class="btn btn-outline-primary" style="background-color: white; color: #007aff; border: 2px solid #007aff; padding: 12px 35px; border-radius: 30px; font-size: 1.1rem; transition: all 0.3s;"
                        onmouseover="this.style.backgroundColor='#007aff'; this.style.color='white';"
                        onmouseout="this.style.backgroundColor='white'; this.style.color='#007aff';"
                        onclick="window.print();">
                    <i class="fas fa-print"></i> Print Event
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    // Optional: you can customize the print window settings if necessary
    function printPage() {
        window.print();
    }
    document.getElementById('delete-button').addEventListener('click', function () {
        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the form
                document.getElementById('delete-event-form').submit();
            }
        });
    });
</script>

@include('dashboard.layouts.core')
</body>

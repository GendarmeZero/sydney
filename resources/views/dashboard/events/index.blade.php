@include('dashboard.layouts.header')

<body>
@include('dashboard.layouts.side')
@include('dashboard.layouts.nav')
<div class="layout-page">
    <div class="container mt-5 w-100%">
        <h1 class="mb-4">Events</h1>
        <a href="{{ route('events.create') }}" class="btn mb-4" style="background-color: #e8d4b7;">Create Event</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            @foreach($events as $event)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card note-card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-primary fw-bold">{{ $event->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                <i class="fas fa-user"></i> Created by: {{ $event->user ? $event->user->name : 'Unknown' }}
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
                                <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="delete-event-form" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-outline-danger btn-sm fw-bold delete-event-button">
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
</div>

<script>
    // Attach event listener to all delete buttons
    document.querySelectorAll('.delete-event-button').forEach(button => {
        button.addEventListener('click', function () {
            const form = this.closest('.delete-event-form'); // Get the corresponding form
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
                    form.submit();
                }
            });
        });
    });
</script>

</body>

@include('dashboard.layouts.footer')

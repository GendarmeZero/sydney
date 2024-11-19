@include('dashboard.layouts.header')

<body>
@include('dashboard.layouts.nav')
@include('dashboard.layouts.side')

<div class="container mt-5">
    <h1 class="text-center mb-4" style="font-weight: 600; color: #333;">Departments List</h1>

    <!-- Create a Row for the Department Cards -->
    <div class="row">
        @foreach($departments as $department)
            <div class="col-md-4 mb-4">
                <!-- Department Card -->
                <div class="card shadow-lg border-0 rounded-3" style="background-color: #ffffff; font-size: 1.1rem;">
                    <div class="card-body p-4">
                        <h5 class="card-title" style="font-weight: 600; color: #333;">{{ $department->name }}</h5>
                        <p class="card-text" style="color: #777; font-size: 0.95rem;">
                            <!-- Display a short description or something about the department -->
                            {{ Str::limit($department->description, 100) }}
                        </p>

                        <!-- View Details Button -->
                        <a href="{{ route('departments.show', $department->id) }}" class="btn btn-primary w-100"
                           style="border-radius: 25px; font-weight: 500; transition: background-color 0.3s; padding: 12px;">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination (if applicable) -->
    <div class="d-flex justify-content-center mt-4">
        {{ $departments->links() }}
    </div>
</div>

</body>

@include('dashboard.layouts.core')

@include('dashboard.layouts.header')

<body>
@include('dashboard.layouts.nav')
@include('dashboard.layouts.side')

<div class="layout-page">
    <div class="container mt-5">
        <h1 class="text-center mb-4" style="font-weight: 600; color: #333;">Departments List</h1>

        <!-- Create a Row for the Department Cards -->
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($departments as $department)
                <div class="col">
                    <!-- Department Card -->
                    <div class="card shadow-lg border rounded-3" style="background-color: #f4f4f4; font-size: 1.1rem; transition: transform 0.3s; border: 1px solid #ddd;">
                        <div class="card-body p-4">
                            <h5 class="card-title" style="font-weight: 600; color: #333;">{{ $department->name }}</h5>
                            <p class="card-text" style="color: #777; font-size: 0.95rem; line-height: 1.5;">
                                <!-- Display a short description or something about the department -->
                                {{ Str::limit($department->description, 100) }}
                            </p>

                            <!-- View Details Button -->
                            <a href="{{ route('departments.show', $department->id) }}" class="btn w-100" style="background-color: #e8d4b7; border-radius: 25px; font-weight: 500; padding: 12px; color: #333; text-transform: uppercase; box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1); transition: background-color 0.3s, transform 0.3s;">
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
</div>

</body>

@include('dashboard.layouts.core')

<style>
    /* Hover effect to lift the card */
    .card:hover {
        transform: translateY(-10px); /* Slightly raise the card on hover */
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15); /* Enhanced shadow on hover */
    }

    /* Optional: Card border and background */
    .card {
        border: 1px solid #ccc; /* Light gray border */
        background-color: #f4f4f4; /* Soft gray background */
    }

    /* Button hover effect */
    .btn:hover {
        background-color: #d1b08e; /* Darker shade of wood for the button */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15); /* Button shadow on hover */
    }
</style>

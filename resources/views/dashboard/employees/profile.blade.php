@extends('dashboard.layouts.header')
@include('dashboard.layouts.header')

<body>
<div class="container mt-5">
    <div class="row">
        <!-- Sidebar with User Image -->
        <div class="col-md-4 text-center">
            <div class="card mb-4 d-flex justify-content-center align-items-center" style="min-height: 300px;">
                <!-- Display profile image -->
                @if($user->additionalInformation && $user->additionalInformation->profile_image)
                    <img src="{{ asset('storage/' . $user->additionalInformation->profile_image) }}" alt="User Image" class="rounded-circle" style="width: 200px; height: 200px; object-fit: cover; border: 5px solid #ddd;" data-bs-toggle="modal" data-bs-target="#imageModal">
                @else
                    <!-- Default image if user has no profile image -->
                    <img src="{{ asset('storage/profile_images/default-image.jpg') }}" alt="Default Image" class="rounded-circle" style="width: 200px; height: 200px; object-fit: cover; border: 5px solid #ddd;" data-bs-toggle="modal" data-bs-target="#imageModal">
                @endif

                @if($user->resume)
                    <a href="{{ asset('storage/resumes/' . $user->resume->resume_file) }}" class="btn btn-primary mt-3" target="_blank">Download Resume</a>
                @endif

                <div class="card-body">
                    <h5 class="card-title">{{ $user->name }}</h5>
                    <p class="card-text">Role: {{ $user->role }}</p> <!-- Added "Role" text -->
                    <p class="card-text">{{ $user->sex ?? 'Not Provided' }}</p>
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
                        <li class="list-group-item"><strong>Full Name:</strong> {{ $user->name }} {{ $user->middleName }} {{ $user->lastName }}</li>
                        <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
                        <li class="list-group-item"><strong>Phone:</strong> {{ $user->phone }}</li>
                        <li class="list-group-item"><strong>Status:</strong> {{ $user->status }}</li>
                        <li class="list-group-item"><strong>Work Location:</strong> {{ $user->work_location }}</li>
                        <li class="list-group-item"><strong>Department:</strong> {{ $user->department->name ?? 'N/A' }}</li>

                        <!-- Calculation Logic for Paid Amounts -->
                        @php
                            $weekly_paid = $user->hourly_paid * 40; // Assuming 40 hours per week
                            $monthly_paid = $weekly_paid * 4; // Approx. 4 weeks per month
                            $yearly_paid = $monthly_paid * 12; // 12 months per year
                        @endphp

                        <li class="list-group-item"><strong>Hourly Paid:</strong> ${{ number_format($user->hourly_paid, 2) }}</li>
                        <li class="list-group-item"><strong>Weekly Paid:</strong> ${{ number_format($weekly_paid, 2) }}</li>
                        <li class="list-group-item"><strong>Monthly Paid:</strong> ${{ number_format($monthly_paid, 2) }}</li>
                        <li class="list-group-item"><strong>Yearly Paid:</strong> ${{ number_format($yearly_paid, 2) }}</li>

                        <li class="list-group-item"><strong>Address:</strong> {{ $user->address }}</li>
                    </ul>
                </div>

                <!-- Edit and Delete Buttons -->
                <div class="card-footer text-center">
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit Profile</a>

                    <!-- Delete Form with SweetAlert2 Confirmation -->
                    <form id="deleteForm" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger" id="deleteButton">Delete Profile</button>
                    </form>

                    <a href="{{ route('users.show') }}" class="btn btn-secondary">Back to Users</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Image Fullscreen -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Profile Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Display full-size image -->
                <img src="{{ asset('storage/' . ($user->additionalInformation->profile_image ?? 'profile_images/default-image.jpg')) }}" alt="User Image" class="img-fluid" style="object-fit: contain;">
            </div>
        </div>
    </div>
</div>

<!-- SweetAlert2 Script -->
<script>
    // Trigger SweetAlert2 confirmation on Delete button click
    document.getElementById('deleteButton').addEventListener('click', function (e) {
        e.preventDefault(); // Prevent the form submission

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If confirmed, submit the form
                document.getElementById('deleteForm').submit();
            }
        });
    });
</script>

</body>

@include('dashboard.layouts.core')

@include('dashboard.layouts.header')

<body>
@include('dashboard.layouts.nav')
@include('dashboard.layouts.side')

<div class="container mt-5">
    <div class="row">
        <!-- Sidebar with User Image -->
        <div class="col-md-4 text-center">
            <div class="card mb-4 d-flex justify-content-center align-items-center" style="min-height: 300px;">
                <!-- Display profile image -->
                @if($user->additionalInformation && $user->additionalInformation->profile_image)
                    <img src="{{ asset('storage/' . $user->additionalInformation->profile_image) }}" alt="User Image" class="rounded-circle" style="width: 200px; height: 200px; object-fit: cover; border: 5px solid #ddd;" data-bs-toggle="modal" data-bs-target="#imageModal">
                @else
                    <img src="{{ asset('storage/profile_images/default-image.jpg') }}" alt="Default Image" class="rounded-circle" style="width: 200px; height: 200px; object-fit: cover; border: 5px solid #ddd;" data-bs-toggle="modal" data-bs-target="#imageModal">
                @endif

                <!-- Download Resume Button -->
                @if($user->additionalInformation && $user->additionalInformation->resume)
                    <a href="{{ asset('storage/' . $user->additionalInformation->resume->filename) }}" class="btn btn-primary mt-3" target="_blank">Download Resume</a>
                @endif

                <div class="card-body">
                    <h5 class="card-title">{{ $user->name }}</h5>
                    <p class="card-text">Role: {{ $user->role }}</p>
                    <p class="card-text">{{ $user->sex ?? 'Not Provided' }}</p>
                </div>
            </div>
        </div>

        <!-- User Information Card -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Profile Information</h4>
                </div>
                <div class="card-body">
                    <!-- Employee Information Section -->
                    <h5 class="mt-3 section-title">Employee Information</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Name:</strong> {{ $user->name }}</li>
                        <li class="list-group-item"><strong>Middle Name:</strong> {{ $user->middleName ?? 'Not Provided' }}</li>
                        <li class="list-group-item"><strong>Last Name:</strong> {{ $user->lastName ?? 'Not Provided' }}</li>
                        <li class="list-group-item"><strong>Phone:</strong> {{ $user->phone }}</li>
                        <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
                        <li class="list-group-item"><strong>Address:</strong> {{ $user->address }}</li>
                        <li class="list-group-item"><strong>Created At:</strong> {{ $user->created_at->format('F j, Y, g:i a') }}</li>
                    </ul>

                    <!-- Position Section -->
                    <h5 class="mt-4 section-title">Position</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Role:</strong> {{ $user->role }}</li>
                        <li class="list-group-item"><strong>Department:</strong> {{ $user->department->name ?? 'N/A' }}</li>
                        <li class="list-group-item"><strong>Work Location:</strong> {{ $user->work_location }}</li>

                        @php
                            $weekly_paid = $user->hourly_paid * 40;
                            $monthly_paid = $weekly_paid * 4;
                            $yearly_paid = $monthly_paid * 12;
                        @endphp

                        <li class="list-group-item"><strong>Hourly Paid:</strong> ${{ number_format($user->hourly_paid, 2) }}</li>
                        <li class="list-group-item"><strong>Weekly Paid:</strong> ${{ number_format($weekly_paid, 2) }}</li>
                        <li class="list-group-item"><strong>Monthly Paid:</strong> ${{ number_format($monthly_paid, 2) }}</li>
                        <li class="list-group-item"><strong>Yearly Paid:</strong> ${{ number_format($yearly_paid, 2) }}</li>
                    </ul>


                    <!-- Additional Information Section -->
                    <h5 class="mt-4 section-title">Additional Information</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Status:</strong> {{ $user->status }}</li>
                        <li class="list-group-item"><strong>Sex:</strong> {{ $user->sex ?? 'Not Provided' }}</li>
                    </ul>
                </div>

                <div class="card-footer text-center mt-4">
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit Profile</a>

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

<!-- Print Button -->
<div class="text-center mt-4">
    <button onclick="window.print();" class="btn btn-info">Print Page</button>
</div>

<!-- SweetAlert2 Script -->
<script>
    document.getElementById('deleteButton').addEventListener('click', function (e) {
        e.preventDefault();

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
                document.getElementById('deleteForm').submit();
            }
        });
    });
</script>

</body>

@include('dashboard.layouts.core')

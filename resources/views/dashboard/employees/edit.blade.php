@include('dashboard.layouts.header')
@include('dashboard.layouts.nav')

<body>

<div class="container mt-5">
    <h1>Edit User</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">First Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="middleName" class="form-label">Middle Name</label>
            <input type="text" class="form-control" id="middleName" name="middleName" value="{{ old('middleName', $user->middleName) }}">
        </div>

        <div class="mb-3">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="lastName" value="{{ old('lastName', $user->lastName) }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            <small class="form-text text-muted">Leave blank if you don't want to change the password.</small>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" id="role" name="role" required>
                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="employee" {{ old('role', $user->role) == 'employee' ? 'selected' : '' }}>Employee</option>
                <option value="manager" {{ old('role', $user->role) == 'manager' ? 'selected' : '' }}>Manager</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="work_location" class="form-label">Work Location</label>
            <select class="form-select" id="work_location" name="work_location" required>
                <option value="onsite" {{ old('work_location', $user->work_location) == 'onsite' ? 'selected' : '' }}>On-site</option>
                <option value="remotely" {{ old('work_location', $user->work_location) == 'remotely' ? 'selected' : '' }}>Remotely</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="hourly_paid" class="form-label">Hourly Paid</label>
            <input type="number" step="0.01" class="form-control" id="hourly_paid" name="hourly_paid" value="{{ old('hourly_paid', $user->hourly_paid) }}" required>
        </div>

        <!-- Profile Image Update -->
        <div class="mb-3">
            <label for="profile_image" class="form-label">Profile Image</label>
            <input type="file" class="form-control" id="profile_image" name="profile_image">
            @if($user->additionalInformation && $user->additionalInformation->profile_image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $user->additionalInformation->profile_image) }}" alt="Profile Image" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                </div>
            @endif
        </div>

        <!-- Resume Update -->
        <div class="mb-3">
            <label for="resume" class="form-label">Resume</label>
            <input type="file" class="form-control" id="resume" name="resume">
            @if($user->resume)
                <div class="mt-2">
                    <a href="{{ asset('storage/resumes/' . $user->resume->resume_file) }}" class="btn btn-primary" target="_blank">Download Current Resume</a>
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="active" {{ old('status', $user->status) == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $user->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" id="address" name="address">{{ old('address', $user->address) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
        </div>

        <button type="submit" class="btn btn-success">Update User</button>
        <a href="{{ route('users.show') }}" class="btn btn-secondary">Back</a>
    </form>
</div>

</body>
@include('dashboard.layouts.core')

@include('dashboard.layouts.header')

<body>
@include('dashboard.layouts.side')
@include('dashboard.layouts.nav')
<div class="layout-page">
    <div class="container mt-5">
        <h1 class="mb-4">Edit User</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card shadow-sm rounded-lg">
            <div class="card-header bg-primary text-white">
                <h4>Edit User Details</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <!-- First Name -->
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                        </div>

                        <!-- Middle Name -->
                        <div class="col-md-6 mb-3">
                            <label for="middleName" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" id="middleName" name="middleName" value="{{ old('middleName', $user->middleName) }}">
                        </div>
                    </div>

                    <div class="row">
                        <!-- Last Name -->
                        <div class="col-md-6 mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" value="{{ old('lastName', $user->lastName) }}">
                        </div>

                        <!-- Email -->
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Password -->
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <small class="form-text text-muted">Leave blank if you don't want to change the password.</small>
                        </div>

                        <!-- Role -->
                        <div class="col-md-6 mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" id="role" name="role" required onchange="toggleDepartmentField()">
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="employee" {{ old('role', $user->role) == 'employee' ? 'selected' : '' }}>Employee</option>
                                <option value="manager" {{ old('role', $user->role) == 'manager' ? 'selected' : '' }}>Manager</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Work Location -->
                        <div class="col-md-6 mb-3">
                            <label for="work_location" class="form-label">Work Location</label>
                            <select class="form-select" id="work_location" name="work_location" required>
                                <option value="onsite" {{ old('work_location', $user->work_location) == 'onsite' ? 'selected' : '' }}>On-site</option>
                                <option value="remotely" {{ old('work_location', $user->work_location) == 'remotely' ? 'selected' : '' }}>Remotely</option>
                            </select>
                        </div>

                        <!-- Hourly Paid -->
                        <div class="col-md-6 mb-3">
                            <label for="hourly_paid" class="form-label">Hourly Paid</label>
                            <input type="number" step="0.01" class="form-control" id="hourly_paid" name="hourly_paid" value="{{ old('hourly_paid', $user->hourly_paid) }}" required>
                        </div>
                    </div>

                    <!-- New Fields -->
                    <div class="row">
                        <!-- Has Car -->
                        <div class="col-md-6 mb-3">
                            <label for="has_car" class="form-label">Has Car</label>
                            <select class="form-select" id="has_car" name="has_car">
                                <option value="yes" {{ old('has_car', $user->additionalInformation->has_car ?? '') == 'yes' ? 'selected' : '' }}>Yes</option>
                                <option value="no" {{ old('has_car', $user->additionalInformation->has_car ?? '') == 'no' ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        <!-- Living In -->
                        <div class="col-md-6 mb-3">
                            <label for="living_in" class="form-label">Living In</label>
                            <input type="text" class="form-control" id="living_in" name="living_in" value="{{ old('living_in', $user->additionalInformation->living_in ?? '') }}">
                        </div>
                    </div>

                    <div class="row">
                        <!-- Kids Number -->
                        <div class="col-md-6 mb-3">
                            <label for="kids_number" class="form-label">Number of Kids</label>
                            <input type="number" class="form-control" id="kids_number" name="kids_number" value="{{ old('kids_number', $user->additionalInformation->kids_number ?? '') }}">
                        </div>

                        <!-- Wife Name -->
                        <div class="col-md-6 mb-3">
                            <label for="wife_name" class="form-label">Spouse Name</label>
                            <input type="text" class="form-control" id="wife_name" name="wife_name" value="{{ old('wife_name', $user->additionalInformation->wife_name ?? '') }}">
                        </div>
                    </div>

                    <div class="row">
                        <!-- Profile Image -->
                        <div class="col-md-6 mb-3">
                            <label for="profile_image" class="form-label">Profile Image</label>
                            <input type="file" class="form-control" id="profile_image" name="profile_image">
                            @if($user->additionalInformation && $user->additionalInformation->profile_image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $user->additionalInformation->profile_image) }}" alt="Profile Image" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                                </div>
                            @endif
                        </div>

                        <!-- Status -->
                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="single" {{ old('status', $user->status) == 'single' ? 'selected' : '' }}>Single</option>
                                <option value="married" {{ old('status', $user->status) == 'married' ? 'selected' : '' }}>Married</option>
                                <option value="divorced" {{ old('status', $user->status) == 'divorced' ? 'selected' : '' }}>Divorced</option>
                            </select>
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" name="address">{{ old('address', $user->address) }}</textarea>
                    </div>

                    <!-- Phone -->
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
                    </div>

                    <!-- Department -->
                    <div class="mb-3" id="department-field" style="{{ in_array(old('role', $user->role), ['manager', 'employee', 'admin']) ? 'display:block;' : 'display:none;' }}">
                        <label for="department" class="form-label">Department</label>
                        <select class="form-select" id="department" name="department_id">
                            <option value="">Select Department</option>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}" {{ old('department_id', $user->department_id) == $department->id ? 'selected' : '' }}>
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Resume -->
                    <div class="mb-3">
                        <label for="resume_id" class="form-label">Resume</label>
                        <select class="form-select" id="resume_id" name="resume_id">
                            <option value="">Select a Resume</option>
                            @foreach($resumes as $resume)
                                <option value="{{ $resume->id }}" {{ old('resume_id', $user->additionalInformation->resume_id ?? '') == $resume->id ? 'selected' : '' }}>
                                    {{ $resume->filename }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="submit" class="btn btn-success">Update User</button>
                        <a href="{{ route('users.show') }}" class="btn btn-secondary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleDepartmentField() {
        var role = document.getElementById("role").value;
        var departmentField = document.getElementById("department-field");

        if (role === "manager" || role === "employee" || role === "admin") {
            departmentField.style.display = "block";
        } else {
            departmentField.style.display = "none";
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        toggleDepartmentField();
    });

</script>
</body>

@include('dashboard.layouts.footer')

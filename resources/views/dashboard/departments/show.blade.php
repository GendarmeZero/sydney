@include('dashboard.layouts.header')

<body>
@include('dashboard.layouts.nav')
@include('dashboard.layouts.side')

<div class="container mt-5">
    <div class="row justify-content-between">
        <!-- Department and Managers Section -->
        <div class="col-lg-8">
            <!-- Department Information -->
            <div class="card shadow-lg rounded-lg mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Department: {{ $department->name }}</h5>
                </div>
                <div class="card-body">
                    <table id="department-details-table" class="table table-bordered table-striped mb-4">
                        <tbody>
                        <tr>
                            <th scope="row">Description</th>
                            <td>{{ $department->description }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Location</th>
                            <td>{{ $department->location }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Budget</th>
                            <td>${{ number_format($department->budget, 2) }}</td>
                        </tr>
                        </tbody>
                    </table>

                    <h5 class="mt-4">Employees</h5>
                    @if($employees->isNotEmpty())
                        <table id="employees-table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->phone }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-center text-muted">No employees assigned to this department.</p>
                    @endif
                </div>
            </div>

            <!-- Managers List -->
            <div class="card shadow-lg rounded-lg mb-4">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Manager List</h5>
                </div>
                <div class="card-body">
                    @if($managers->isNotEmpty())
                        <table id="managers-table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($managers as $manager)
                                <tr>
                                    <td>{{ $manager->name }}</td>
                                    <td>{{ $manager->email }}</td>
                                    <td>{{ $manager->phone }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-center text-muted">No managers assigned to this department.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Sticky Sidebar with Print Button -->
        <div class="col-lg-3 d-none d-lg-block">
            <div class="position-sticky" style="top: 100px;">
                <div class="card shadow-lg rounded-lg">
                    <div class="card-header bg-warning text-white">
                        <h5 class="mb-0">Actions</h5>
                    </div>
                    <div class="card-body text-center p-4">
                        <button class="btn btn-outline-primary w-100" onclick="window.print();">Print Department Information</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Back Button -->
    <div class="text-center mt-4">
        <a href="{{ route('departments.index') }}" class="btn btn-primary">Back to Departments</a>
    </div>
</div>

<!-- External CSS and JavaScript for Print -->
<link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
<script src="{{ asset('assets/js/scripts.js') }}"></script>

</body>

@include('dashboard.layouts.core')

@include('dashboard.layouts.header')

<body>
@include('dashboard.layouts.side')
@include('dashboard.layouts.nav')

<div class="layout-page">
    <div class="container">
        <h1>Assign Users to Achievement: {{ $achievement->title }}</h1>

        <!-- Show Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form to Assign Users -->
        <div class="card mb-4">
            <div class="card-header">
                <h5>Select Users to Assign</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('achievements.storeAssignment', $achievement->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        @foreach ($users as $user)
                            <div class="col-md-4 mb-2">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="users[]" value="{{ $user->id }}" id="user-{{ $user->id }}">
                                    <label class="form-check-label" for="user-{{ $user->id }}">
                                        {{ $user->name }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Assign Users</button>
                </form>
            </div>
        </div>

        <!-- Assigned Users Table -->
        <div class="card">
            <div class="card-header">
                <h5>Currently Assigned Users</h5>
            </div>
            <div class="card-body">
                @if ($achievement->users->isEmpty())
                    <p>No users are currently assigned to this achievement.</p>
                @else
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($achievement->users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>
                                    <!-- Form to unassign the user from the achievement -->
                                    <form action="{{ route('achievements.removeAssignment', [$achievement->id, $user->id]) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('PATCH') <!-- Use PATCH to update the record -->
                                        <button type="submit" class="btn btn-danger btn-sm">Unassign</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>

@include('dashboard.layouts.core')

<style>
    /* Custom styling for the checkboxes */
    .form-check-label {
        font-weight: 600;
    }
    .form-check-input {
        margin-right: 10px;
    }

    /* Optional custom styling for table */
    .table th, .table td {
        text-align: center;
        vertical-align: middle;
    }

    /* Success message style */
    .alert-success {
        margin-top: 20px;
    }
</style>

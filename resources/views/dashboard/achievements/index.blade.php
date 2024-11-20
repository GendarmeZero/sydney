@include('dashboard.layouts.header')

<body>
@include('dashboard.layouts.side')
@include('dashboard.layouts.nav')
<div class="layout-page">
    <div class="container">
        <h1 class="mb-4">Achievements</h1>

        <!-- Create Achievement Button -->
        <a href="{{ route('achievements.create') }}" class="btn mb-4" style="background-color: #e8d4b7;">Create Achievement</a>

        <!-- Achievements Table -->
        <table class="table table-bordered table-striped table-hover mt-4">
            <thead class="thead-dark">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Date</th>
                <th>Image</th>
                <th>Assigned Users Count</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($achievements as $achievement)
                <tr>
                    <td>{{ $achievement->title }}</td>
                    <td>{{ Str::limit($achievement->description, 50) }}</td> <!-- Truncate description for better readability -->
                    <td>{{ \Carbon\Carbon::parse($achievement->date)->format('M d, Y') }}</td> <!-- Format date -->
                    <td>
                        @if ($achievement->image_path)
                            <img src="{{ asset('storage/' . $achievement->image_path) }}" alt="Achievement Image" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                        @else
                            <span>No Image</span>
                        @endif
                    </td>
                    <td>
                        <!-- Display the total count of users assigned to the achievement -->
                        {{ $achievement->users()->count() }} Users
                    </td>
                    <td>
                        <!-- Button to go to the page where users are listed for this achievement -->
                        <a href="{{ route('achievements.showUsers', $achievement->id) }}" class="btn btn-info btn-sm">View Assigned Users</a>
                        <a href="{{ route('achievements.assign', $achievement->id) }}" class="btn btn-warning btn-sm">Assign Users</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('dashboard.layouts.core')

<style>
    /* Optional: Custom styling for the table */
    .table th, .table td {
        text-align: center;
        vertical-align: middle;
    }

    .table img {
        border-radius: 5px;
    }
</style>

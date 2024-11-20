@include('dashboard.layouts.header')

<body>
@include('dashboard.layouts.side')
@include('dashboard.layouts.nav')

<div class="layout-page">
    <div class="container">
        <h1 class="mb-4">Users Assigned to Achievement: {{ $achievement->title }}</h1>

        <!-- Back to Achievements Button -->
        <a href="{{ route('achievements.index') }}" class="btn btn-secondary mb-3">Back to Achievements</a>

        <!-- Users Table -->
        <table class="table table-bordered table-striped table-hover mt-4">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">View User</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('dashboard.layouts.core')

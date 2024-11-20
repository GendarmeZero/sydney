@include('dashboard.layouts.header')
<body>
@include('dashboard.layouts.side')
@include('dashboard.layouts.nav')

<div class="container mt-5">
    <h2 class="mb-4">Users with Skill: {{ $skill->skill }}</h2>
    <a href="{{ route('skills.index') }}" class="btn btn-secondary mt-3">Back to Skills</a>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Proficiency</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ ucfirst($user->pivot->proficiency) }}</td> <!-- 'pivot' to access the 'proficiency' column -->
            </tr>
        @endforeach
        </tbody>
    </table>

</div>

@include('dashboard.layouts.footer')
</body>

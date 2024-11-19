@include('dashboard.layouts.header')

<body>
@include('dashboard.layouts.nav')
@include('dashboard.layouts.side')
    <h1>Skills and Assigned Users</h1>

    <table>
        <thead>
        <tr>
            <th>Skill</th>
            <th>Assigned User</th>
        </tr>
        </thead>
        <tbody>
        @foreach($skills as $skill)
            <tr>
                <td>{{ $skill->skill }}</td>
                <td>
                    @if($skill->user)
                        {{ $skill->user->name }}
                    @else
                        No user assigned
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>

    @include('dashboard.layouts.core')

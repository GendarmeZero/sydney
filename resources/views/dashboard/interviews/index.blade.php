@include('dashboard.layouts.header')

<body>
@include('dashboard.layouts.side')
@include('dashboard.layouts.nav')

    <div class="container mt-5">
        <h1 class="mb-4">Interviews</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-3">

            <a href="{{ route('interviews.create') }}" class=btn mb-4 style="background-color: #e8d4b7;">Create New Interview</a>
        </div>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Interview Date</th>
                <th>Interviewer</th>
                <th>Resume</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($interviews as $interview)
                <tr>
                    <td>{{ $interview->name }}</td>
                    <td>{{ $interview->interview_date }}</td>
                    <td>{{ $interview->user->name }}</td>
                    <td>{{ $interview->resume->filename }}</td>
                    <td>
                        <a href="{{ route('interviews.edit', $interview->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('interviews.destroy', $interview->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @include('dashboard.layouts.core')

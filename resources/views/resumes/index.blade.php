<div class="container">
    <h1 class="mb-4">Resumes</h1>
    <a href="{{ route('resumes.create') }}" class="btn btn-primary mb-3">Upload New Resume</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>User</th>
            <th>Resume</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($resumes as $resume)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $resume->user->name }}</td>
                <td>{{ $resume->original_filename }}</td>
                <td>
                    <a href="{{ route('resumes.download', $resume->id) }}" class="btn btn-success">Download</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
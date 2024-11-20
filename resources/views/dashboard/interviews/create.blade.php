@include('dashboard.layouts.header')

<body>
@include('dashboard.layouts.side')
@include('dashboard.layouts.nav')
    <div class="container mt-5">
        <h1 class="mb-4">Create Interview</h1>

        <form action="{{ route('interviews.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Interview Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="interview_date" class="form-label">Interview Date</label>
                <input type="date" class="form-control" id="interview_date" name="interview_date" required>
            </div>

            <div class="mb-3">
                <label for="user_id" class="form-label">Interviewer</label>
                <select class="form-select" id="user_id" name="user_id" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="resume_id" class="form-label">Resume</label>
                <select class="form-select" id="resume_id" name="resume_id" required>
                    @foreach($resumes as $resume)
                        <option value="{{ $resume->id }}">{{ $resume->filename }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Save Interview</button>
        </form>
    </div>
@include('dashboard.layouts.core')

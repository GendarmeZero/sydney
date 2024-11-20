@include('dashboard.layouts.header')

<body>
@include('dashboard.layouts.side')
@include('dashboard.layouts.nav')
    <div class="container mt-5">
        <h1 class="mb-4">Edit Interview</h1>

        <form action="{{ route('interviews.update', $interview->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Interview Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $interview->name }}" required>
            </div>

            <div class="mb-3">
                <label for="interview_date" class="form-label">Interview Date</label>
                <input type="date" class="form-control" id="interview_date" name="interview_date" value="{{ $interview->interview_date }}" required>
            </div>

            <div class="mb-3">
                <label for="user_id" class="form-label">Interviewer</label>
                <select class="form-select" id="user_id" name="user_id" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $interview->user_id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="resume_id" class="form-label">Resume</label>
                <select class="form-select" id="resume_id" name="resume_id" required>
                    @foreach($resumes as $resume)
                        <option value="{{ $resume->id }}" {{ $resume->id == $interview->resume_id ? 'selected' : '' }}>
                            {{ $resume->filename }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-warning">Update Interview</button>
        </form>
    </div>
@include('dashboard.layouts.core')

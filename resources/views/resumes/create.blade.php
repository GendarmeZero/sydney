<div class="container">
    <h1 class="mb-4">Upload Resume</h1>

    <form action="{{ route('resumes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="resume" class="form-label">Resume File</label>
            <input type="file" class="form-control" id="resume" name="resume" required>
            @error('resume')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Upload</button>
        <a href="{{ route('resumes.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
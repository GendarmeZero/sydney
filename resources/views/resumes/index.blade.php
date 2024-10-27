@extends('dashboard.layouts.header')
@include('dashboard.layouts.header')
<body>
@include('dashboard.layouts.side')
@include('dashboard.layouts.nav')

<div class="container p-4" style="background-color: #f9f9f9; border-radius: 8px;">
    <h1 class="mb-4">Resumes</h1>

    <!-- Button to Open Modal -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#uploadResumeModal">
        Upload New Resume
    </button>

    <!-- Success Alert -->
    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: "{{ session('success') }}",
                    timer: 2000,
                    showConfirmButton: false
                });
            });
        </script>
    @endif

    <!-- Resumes Table -->
    <table class="table table-bordered">
        <thead class="bg-white">
        <tr>
            <th style="background-color: #e9ecef;">#</th> <!-- Darker background for first column -->
            <th>Uploaded By</th>
            <th>Resume</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($resumes as $resume)
            <tr>
                <td style="background-color: #e9ecef;">{{ $loop->iteration }}</td> <!-- Darker background for first column cells -->
                <td>{{ $resume->user->name }}</td>
                <td>{{ $resume->original_filename }}</td>
                <td class="d-flex">
                    <a href="{{ route('resumes.download', $resume->id) }}" class="btn btn-success me-2">Download</a>

                    <!-- Delete Button with Confirmation -->
                    <form action="{{ route('resumes.destroy', $resume->id) }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger delete-btn">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<!-- Upload Resume Modal -->
<div class="modal fade" id="uploadResumeModal" tabindex="-1" aria-labelledby="uploadResumeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadResumeModalLabel">Upload Resume</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Include Bootstrap 5.0 JS and SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- SweetAlert Delete Confirmation Script -->
<script>
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            const form = this.closest('.delete-form');

            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>

</body>

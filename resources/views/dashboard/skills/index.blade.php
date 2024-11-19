@include('dashboard.layouts.header')

<body>
@include('dashboard.layouts.nav')
@include('dashboard.layouts.side')

<div class="container mt-5">
    <h1 class="mb-4">Skills Management</h1>

    <!-- Display Skills Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Skill</th>
                <th>Proficiency</th>
                <th>Assigned User</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($skills as $skill)
                <tr>
                    <td>{{ $skill->skill }}</td>
                    <td>{{ ucfirst($skill->proficiency) }}</td>
                    <td>
                        @if($skill->user)
                            {{ $skill->user->name }}
                        @else
                            No user assigned
                        @endif
                    </td>
                    <td>
                        <!-- Assign User Form -->
                        <form action="{{ route('skills.assign', $skill->id) }}" method="POST" class="d-inline">
                            @csrf
                            <select name="user_id" class="form-select mb-2" required>
                                <option value="">Select User</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary btn-sm">Assign User</button>
                        </form>


                        <!-- Delete Skill Form -->
                        <form action="{{ route('skills.delete', $skill->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this skill?');" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete Skill</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- Create New Skill Form -->
    <h2>Create New Skill</h2>
    <form action="{{ route('skills.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="skill" class="form-label">Skill Name</label>
            <input type="text" class="form-control" name="skill" id="skill" placeholder="Enter skill name" required>
        </div>
        <div class="mb-3">
            <label for="proficiency" class="form-label">Proficiency</label>
            <select name="proficiency" id="proficiency" class="form-select" required>
                <option value="beginner">Beginner</option>
                <option value="intermediate">Intermediate</option>
                <option value="expert">Expert</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Create Skill</button>
    </form>


@include('dashboard.layouts.core')
</body>

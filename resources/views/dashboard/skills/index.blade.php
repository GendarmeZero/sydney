@include('dashboard.layouts.header')
<body>
@include('dashboard.layouts.side')
@include('dashboard.layouts.nav')

<div class="container mt-5">
    <h2 class="mb-4">Skills</h2>

    <div class="d-flex justify-content-end mb-3">
        <button class="btn btn-primary" onclick="document.getElementById('addSkillForm').style.display='block';">
            Add New Skill
        </button>
    </div>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Skill</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($skills as $skill)
            <tr>
                <td>{{ $skill->skill }}</td>
                <td>
                    <!-- Assign Button -->
                    <button class="btn btn-info btn-sm" onclick="assignSkill({{ $skill->id }})">Assign to User</button>
                    <!-- View Users Button -->
                    <a href="{{ route('skills.showUsers', $skill->id) }}" class="btn btn-primary btn-sm">View Users</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Add Skill Form -->
    <div id="addSkillForm" style="display:none;">
        <form action="{{ route('skills.add') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="skill" class="form-label">Skill Name</label>
                <input type="text" class="form-control" id="skill" name="skill" required>
            </div>
            <button type="submit" class="btn btn-success">Add Skill</button>
            <button type="button" class="btn btn-secondary" onclick="document.getElementById('addSkillForm').style.display='none';">Cancel</button>
        </form>
    </div>
</div>

<!-- Assign Skill Modal -->
<div id="assignSkillModal" class="modal" tabindex="-1" aria-labelledby="assignSkillModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="assignSkillModalLabel">Assign Skill</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('skills.assign') }}" method="POST">
                    @csrf
                    <input type="hidden" id="skill_id" name="skill_id">

                    <div class="mb-3">
                        <label for="user_id" class="form-label">User</label>
                        <select id="user_id" name="user_id" class="form-control" required>
                            @foreach(App\Models\User::all() as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="proficiency" class="form-label">Proficiency</label>
                        <select id="proficiency" name="proficiency" class="form-control" required>
                            <option value="beginner">Beginner</option>
                            <option value="intermediate">Intermediate</option>
                            <option value="expert">Expert</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Assign Skill</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function assignSkill(skillId) {
        // Set the skill_id to the hidden input field in the modal
        document.getElementById('skill_id').value = skillId;

        // Show the modal
        var myModal = new bootstrap.Modal(document.getElementById('assignSkillModal'));
        myModal.show();
    }
</script>

@include('dashboard.layouts.core')

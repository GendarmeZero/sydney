<div class="container">
    <h1>{{ $user->name }}'s Profile</h1>

    <ul class="list-group">
        <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
        <li class="list-group-item"><strong>Phone:</strong> {{ $user->phone }}</li>
        <li class="list-group-item"><strong>Company:</strong> {{ $user->company }}</li>
        <li class="list-group-item"><strong>Country:</strong> {{ $user->country }}</li>
        <li class="list-group-item"><strong>Role:</strong> {{ $user->role }}</li>
    </ul>

    <a href="{{ route('users.show') }}" class="btn btn-secondary mt-3">Back to Users</a>
</div>
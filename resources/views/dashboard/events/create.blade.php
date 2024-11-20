@include('dashboard.layouts.header')

<body>
@include('dashboard.layouts.side')
@include('dashboard.layouts.nav')
<div class="layout-page">
    <div class="container">
        <h1>Create Event</h1>
        <form action="{{ route('events.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4"></textarea>
            </div>
            <div class="mb-3">
                <label for="event_date" class="form-label">Event Date</label>
                <input type="date" class="form-control" id="event_date" name="event_date" required>
            </div>
            <button type="submit" class="btn mb-4" style="background-color: #e8d4b7;">Submit</button>
            <a href="{{ route('events.index') }}" class="btn mb-4" style="background-color: #e8d4b7;">Cancel</a>
        </form>
    </div>
</div>
</body>



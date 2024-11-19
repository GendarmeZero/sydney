<nav class="navbar navbar-expand-lg navbar-light fixed-top custom-navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">Sydney</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}#section-header">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}#Features">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('subscription') }}">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/about') }}">About Sydney</a>
                </li>
            </ul>
            <div class="d-flex">
                @auth
                    <!-- Check if the user's role is admin or manager to display Dashboard -->
                    @if (Auth::user()->role == 'admin' || Auth::user()->role == 'manager')
                        <a class="btn btn-navbar" href="{{ url('/dashboard') }}">Dashboard</a>
                    @endif
                    <!-- Profile button for all authenticated users -->
                    <a class="btn btn-navbar" href="{{ route('profile.show') }}">Profile</a>

                    <!-- Logout Button -->
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-navbar">Logout</button>
                    </form>
                @else
                    <a class="btn btn-navbar" href="{{ route('login') }}">Log in</a>
                    @if (Route::has('register'))
                        <a class="btn btn-navbar" href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</nav>

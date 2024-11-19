<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <!-- Navbar Brand (Logo or Name) -->
        <a href="{{ route('index') }}" class="app-brand-text demo menu-text fw-bold ms-2">Sydney</a>

        <!-- Toggler Button for Mobile Screens -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Items -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <!-- Weather Icon (Replaced image with icon) -->
                <li class="nav-item d-flex align-items-center me-3">
                    <i class="bx bx-cloud me-2" style="font-size: 18px;"></i>
                    <div class="text">
                        <h6 class="mb-0" id="weatherText">loading...</h6>
                    </div>
                </li>

                <!-- Date and Time Info -->
                <li class="nav-item d-flex align-items-center me-3">
                    <i class="bx bx-calendar me-2" style="font-size: 18px;"></i>
                    <div class="text">
                        <h6 class="mb-0" id="dateText">loading...</h6>
                    </div>
                </li>
                <li class="nav-item d-flex align-items-center me-3">
                    <i class="bx bx-time me-2" style="font-size: 18px;"></i>
                    <div class="text">
                        <h6 class="mb-0" id="clockText">loading...</h6>
                    </div>
                </li>

                <!-- Navbar Links for small screens (visible under 1200px) -->
                <li class="nav-item d-xl-none">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="menu-icon fa fa-home"></i>
                        Home
                    </a>
                </li>

                <li class="nav-item d-xl-none">
                    <a href="{{ route('events.index') }}" class="nav-link">
                        <i class="menu-icon fa fa-calendar-alt"></i>
                        Events
                    </a>
                </li>

                <li class="nav-item d-xl-none">
                    <a href="" class="nav-link">
                        <i class="menu-icon fa fa-sticky-note"></i>
                        Notes
                    </a>
                </li>

                <li class="nav-item d-xl-none">
                    <a href="{{ route('dashboard.employees') }}" class="nav-link">
                        <i class="menu-icon fa fa-users"></i>
                        Employees
                    </a>
                </li>

                <li class="nav-item d-xl-none">
                    <a href="{{ route('resumes.index') }}" class="nav-link">
                        <i class="menu-icon fa fa-file-alt"></i>
                        Resumes
                    </a>
                </li>

                <!-- User Info -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../assets/img/avatars/1.png" alt="User Avatar" class="rounded-circle" width="40">
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="#">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar avatar-online">
                                            <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                                        <small class="text-muted">{{ Auth::user()->role }}</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">My Profile</a></li>
                        <li><a class="dropdown-item" href="#">Billing Plan</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a></li>
                    </ul>
                </li>

                <!-- Username visible in Navbar -->
                <li class="nav-item">
                    <span class="nav-link">{{ Auth::user()->name }}</span>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Log Out Form -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

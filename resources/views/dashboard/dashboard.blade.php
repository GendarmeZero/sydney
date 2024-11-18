@include('dashboard.layouts.header')
<body>
@include('dashboard.layouts.side')
@include('dashboard.layouts.nav')

{{--database show start--}}
@foreach($users as $user)
    @php
        $userId = $user->id;
        $userName = $user->name;
    @endphp
@endforeach
{{--database show end--}}

<div class="layout-page">

    <!-- Content wrapper -->
    <div class="content-wrapper">

        {{-- Content start--}}
        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="row">
                <div class="col-xlg-6 mb-6 order-0">
                    <div class="card">
                        <div class="d-flex align-items-start row">
                            <div class="col-sm-7">
                                <div class="card-body">
                                    @auth
                                        <h5 class="card-title text-primary mb-3">Welcome {{ Auth::user()->name }}
                                            😊</h5>
                                    @endauth
                                    <p class="mb-6">
                                        Make sure to check latest events !
                                    </p>
                                    <a href="javascript:;" class="btn btn-sm btn-outline-primary">View news</a>
                                </div>
                            </div>
                            <div class="col-sm-5 text-center text-sm-left">
                                <div class="card-body pb-0 px-0 px-md-6">
                                    <img src="../assets/img/illustrations/man-with-laptop.png" height="175"
                                         class="scaleX-n1-rtl" alt="View Badge User">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-4 order-1">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-6 mb-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                        <div class="avatar flex-shrink-0">
                                            <!-- Font Awesome icon for employees -->
                                            <i class="fas fa-users fs-3 text-primary"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">Total Employees</h5>
                                        <h6 class="card-title mb-3"> Managers {{ $managerCount }}</h6>
                                        <h6 class="card-title mb-3"> Admins {{ $adminCount }}</h6>
                                        <h6 class="card-title mb-3"> Employees {{ $employeeCount }}</h6>
                                        <h6 class="card-title mb-3"> Total {{ $allUsersCount }}</h6>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-6 mb-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                        <div class="avatar flex-shrink-0">
                                            <!-- Font Awesome icon for departments or wallet -->
                                            <i class="fas fa-sitemap fs-3 text-primary"></i>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-6 mb-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                        <div class="avatar flex-shrink-0">
                                            <!-- Font Awesome icon for male employees -->
                                            <i class="fas fa-male fs-3 text-primary"></i>
                                        </div>

                                    </div>
                                    <p class="mb-1">Male</p>
                                    <h4 class="card-title mb-3">{{ $maleCount }}</h4>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-6 mb-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                        <div class="avatar flex-shrink-0">
                                            <!-- Font Awesome icon for female employees -->
                                            <i class="fas fa-female fs-3 text-primary"></i>
                                        </div>

                                    </div>
                                    <p class="mb-1">Female</p>
                                    <h4 class="card-title mb-3">{{ $femaleCount }}</h4>

                                </div>
                            </div>
                        </div>
                        <div class="col-xlg-6 col-md-12 col-6 mb-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                        <div class="avatar flex-shrink-0">
                                            <!-- Font Awesome icon for status or activity -->
                                            <i class="fas fa-chart-line fs-3 text-primary"></i>
                                        </div>

                                    </div>
                                    <h5 class="mb-1">Employees Status for
                                        <script>
                                            const today = new Date();
                                            document.write(today.toLocaleDateString());
                                        </script>
                                    </h5>
                                    <h6 class="card-title mb-3">Today working: {{ $working }}</h6>
                                    <h6 class="card-title mb-3">Not working: {{ $notWorking }}</h6>
                                    <h6 class="card-title mb-3">On vacation: {{ $onVacation }}</h6>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div>

                    </div>
                </div>
                <div class="col-lg-7 mb-6 order-3">
                    <div class="col-xlg-6 col-md-12 col-6 mb-6">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                    <div class="avatar flex-shrink-0">
                                        <!-- Font Awesome icon for events -->
                                        <i class="fas fa-calendar-alt fs-1 text-primary"></i>
                                    </div>
                                </div>
                                <h2 class="mb-1">Latest Events</h2>
                                <ul class="list-unstyled mt-3">
                                    @foreach($latestEvents as $event)
                                        <li class="mb-2">
                                            <a href="{{ route('events.show', $event->id) }}" class="text-decoration-none text-dark">
                                                <strong>{{ $event->name }}</strong>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <a href="{{ route('events.index') }}" class="btn btn-sm btn-primary mt-4">View All Events</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        {{-- Content end --}}

        <!-- Footer -->
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
                <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                    <div class="text-body">
                        ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        2024
                        , made with ❤️ by
                        <a href="https://themeselection.com" target="_blank" class="footer-link">ThemeSelection</a>
                    </div>
                    <div class="d-none d-lg-inline-block">
                        <a href="https://themeselection.com/license/" class="footer-link me-4"
                           target="_blank">License</a>
                        <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More
                            Themes</a>

                        <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/documentation/"
                           target="_blank" class="footer-link me-4">Documentation</a>

                        <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                           target="_blank" class="footer-link">Support</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
</div>
</body>
@include('dashboard.layouts.core')

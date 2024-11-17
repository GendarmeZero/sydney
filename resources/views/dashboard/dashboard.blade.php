@extends('dashboard.layouts.header')
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
        <!-- Content -->

        {{--Time, Weather API start--}}

        <div class="container">
            <div class="row">

                <div class="col-4 mb-4 weatherDiv">
                    <div class="card h-100 w-100">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                <div class="d-flex align-items-center w-100 justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="../assets/img/icons/unicons/weather.png" alt="time" class="rounded">
                                    </div>
                                    <div class="text">
                                        <p class="mb-0">Today weather in Jordan</p>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-1" id="weatherText">loading...</p>
                        </div>
                    </div>
                </div>

                <!-- Time Div -->
                <div class="col-4 mb-4 timeDive">
                    <div class="card h-100 w-100">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                <div class="d-flex align-items-center w-100 justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="../assets/img/icons/unicons/time.png" alt="time" class="rounded">
                                    </div>
                                    <div class="text">
                                        <p class="mb-0">Today time in Jordan</p>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-1" id="clockText">loading...</p>
                        </div>
                    </div>
                </div>

                <!-- Date Div -->
                <div class="col-4 mb-4 div3 date">
                    <div class="card h-100 w-100">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                <div class="d-flex align-items-center w-100 justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="../assets/img/icons/unicons/date.png" alt="time" class="rounded">
                                    </div>
                                    <div class="text">
                                        <p class="mb-0">Today date in Jordan</p>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-1" id="dateText">loading...</p>
                        </div>
                    </div>
                </div>

                <!-- Tips Div -->
                <div class="col-4 mb-4 div4 qoute">
                    <div class="card h-100 w-100">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                <div class="d-flex align-items-center w-100 justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="../assets/img/icons/unicons/note.png" alt="time" class="rounded">
                                    </div>
                                    <div class="text">
                                        <p class="mb-0">here is some tips 😄</p>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-1" id="tipsText">loading some tips... :)</p>
                        </div>
                    </div>
                </div>

                <!-- events Div -->
                <div class="col-4 mb-4 div5 events">
                    <div class="card h-100 w-100">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                <div class="d-flex align-items-center w-100 justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="../assets/img/icons/unicons/note.png" alt="time" class="rounded">
                                    </div>
                                    <div class="text">
                                        <p class="mb-0">lasts events </p>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-1" id="tipsText">loading events... :)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--Time, Weather API end--}}

        {{-- Content start--}}
        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="row">
                <div class="col-xxl-8 mb-6 order-0">
                    <div class="card">
                        <div class="d-flex align-items-start row">
                            <div class="col-sm-7">
                                <div class="card-body">
                                    @auth
                                        <h5 class="card-title text-primary mb-3">Welcome {{ Auth::user()->name }}
                                            😊</h5>
                                    @endauth
                                    <p class="mb-6">
                                        another day another dollar.
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
                <div class="col-lg-4 col-md-4 order-1">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-6 mb-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                        <div class="avatar flex-shrink-0">
                                            <img src="../assets/img/icons/unicons/emp.png" alt="wallet info"
                                                 class="rounded">
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn p-0" type="button" id="cardOpt6"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded text-muted"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mb-1">Total Employees</p>
                                    <h4 class="card-title mb-3">{{ $allUsersCount }}</h4>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-6 mb-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                        <div class="avatar flex-shrink-0">
                                            <img src="../assets/img/icons/unicons/emp.png" alt="wallet info"
                                                 class="rounded">
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn p-0" type="button" id="cardOpt6"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded text-muted"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mb-1">Employees Status</p>
                                    <h4 class="card-title mb-3">{{ $working }}</h4>
                                    <h4 class="card-title mb-3">{{ $notWorking }}</h4>
                                    <h4 class="card-title mb-3">{{ $onVacation }}</h4>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-6 mb-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                        <div class="avatar flex-shrink-0">
                                            <img src="../assets/img/icons/unicons/male.png"
                                                 alt="chart success"
                                                 class="rounded">
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn p-0" type="button" id="cardOpt3"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded text-muted"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                            </div>
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
                                            <img src="../assets/img/icons/unicons/female.png" alt="wallet info"
                                                 class="rounded">
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn p-0" type="button" id="cardOpt6"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded text-muted"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mb-1">Female</p>
                                    <h4 class="card-title mb-3">{{ $femaleCount }}</h4>

                                </div>
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


@include('dashboard.layouts.header')
@include('dashboard.layouts.nav')
<body>
@include('dashboard.layouts.side')

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

        {{-- Content start --}}
        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="row">
                <div class="col-xlg-6 mb-6 order-0">
                    <div class="card">
                        <div class="d-flex align-items-start row">
                            <div class="col-sm-7">
                                <div class="card-body">
                                    @auth
                                        <h5 class="card-title text-primary mb-3">Welcome {{ Auth::user()->name }} 😊</h5>
                                    @endauth
                                    <p class="mb-6">
                                        Make sure to check latest events!
                                    </p>
                                        <a href="{{ route('events.index') }}" class="btn btn-sm btn-lightwood">View news</a>
                                </div>
                            </div>
                            <div class="col-sm-5 text-center text-sm-left">
                                <div class="card-body pb-0 px-0 px-md-6">
                                    <img src="../assets/img/illustrations/man-with-laptop.png" height="175"
                                         class="scaleX-n1-rtl img-fluid" alt="View Badge User">
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
                                            <i class="fas fa-address-book fs-3 text-secondary"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">Total Employees</h5>
                                        <h6 class="card-title mb-3">Managers: {{ $managerCount }}</h6>
                                        <h6 class="card-title mb-3">Admins: {{ $adminCount }}</h6>
                                        <h6 class="card-title mb-3">Employees: {{ $employeeCount }}</h6>
                                        <h6 class="card-title mb-3">Total: {{ $allUsersCount }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-6 mb-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                        <div class="avatar flex-shrink-0">
                                            <!-- Change the icon to a more fitting one, such as building or department-related -->
                                            <i class="fas fa-building fs-3 text-secondary"></i>
                                        </div>
                                    </div>
                                    <h5 class="mb-1">Departments</h5>
                                    <ul class="list-unstyled mt-3">
                                        @foreach($departments as $department)
                                            <li class="mb-2">
                                                <strong>{{ $department->name }}</strong>:
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-6 col-md-12 col-6 mb-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                        <div class="avatar flex-shrink-0">
                                            <i class="fas fa-male fs-3 text-secondary"></i>
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
                                            <i class="fas fa-female fs-3 text-secondary"></i>
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
                                            <i class="fas fa-chart-line fs-3 text-secondary"></i>
                                        </div>
                                    </div>
                                    <h5 class="mb-1">Employee Status for
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
                </div>

                <!-- Cards for Latest Events and Interviews -->
                <div class="col-lg-7 mb-6 order-3">
                    <!-- Card 1: Latest Events -->
                    <div class="col-12 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                    <div class="avatar flex-shrink-0">
                                        <i class="fas fa-calendar-check fs-3 text-secondary"></i>
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
                                <a href="{{ route('events.index') }}" class="btn btn-sm btn-outline-lightwood mt-4">View All Events</a>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2: Interviews -->
                    <div class="col-12 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                    <div class="avatar flex-shrink-0">
                                        <i class="fas fa-user-check fs-3 text-secondary"></i>
                                    </div>
                                </div>
                                <h2 class="mb-1">Interviews</h2>
                                <ul class="list-unstyled mt-3">
                                    @foreach($latestInterviews as $interview)
                                        <li class="mb-2 d-flex justify-content-between align-items-center">
                                            <div>
                                                <strong>{{ $interview->name }}</strong><br>
                                                <small class="text-muted">Scheduled for: {{ $interview->interview_date }}</small><br>
                                                <span class="badge bg-info">{{ $interview->position }}</span>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <a href="{{ route('interviews.index') }}" class="btn btn-sm btn-outline-lightwood mt-4">View All Interviews</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        {{-- Content end --}}

        <!-- Standalone Section for Charts -->
        <div class="container-xxl flex-grow-1 container-p-y mt-5">
            <h4 class="mb-4">Data Visualization</h4>
            <div class="row">
                <!-- First Chart (Top row, full width) -->
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="employeeChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Second Chart (Top row, full width) -->
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="genderChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Third Chart (Bottom row, full width) -->
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="statusChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Fourth Chart (Bottom row, full width) -->
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="eventsChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
</div>

<!-- Add necessary JS for charts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const employeeChartCtx = document.getElementById('employeeChart').getContext('2d');
    const genderChartCtx = document.getElementById('genderChart').getContext('2d');
    const statusChartCtx = document.getElementById('statusChart').getContext('2d');
    const eventsChartCtx = document.getElementById('eventsChart').getContext('2d');

    const employeeChart = new Chart(employeeChartCtx, {
        type: 'pie',
        data: {
            labels: ['Managers', 'Admins', 'Employees'],
            datasets: [{
                label: 'Employees Distribution',
                data: [{{ $managerCount }}, {{ $adminCount }}, {{ $employeeCount }}],
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                borderColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                borderWidth: 1
            }]
        }
    });

    const genderChart = new Chart(genderChartCtx, {
        type: 'bar',
        data: {
            labels: ['Male', 'Female'],
            datasets: [{
                label: 'Gender Distribution',
                data: [{{ $maleCount }}, {{ $femaleCount }}],
                backgroundColor: ['#007bff', '#e83e8c'],
                borderColor: ['#007bff', '#e83e8c'],
                borderWidth: 1
            }]
        }
    });

    const statusChart = new Chart(statusChartCtx, {
        type: 'doughnut',
        data: {
            labels: ['Working', 'Not Working', 'On Vacation'],
            datasets: [{
                label: 'Employee Status',
                data: [{{ $working }}, {{ $notWorking }}, {{ $onVacation }}],
                backgroundColor: ['#28a745', '#dc3545', '#ffc107'],
                borderColor: ['#28a745', '#dc3545', '#ffc107'],
                borderWidth: 1
            }]
        }
    });

    const eventsChart = new Chart(eventsChartCtx, {
        type: 'line',
        data: {
            labels: ['Event 1', 'Event 2', 'Event 3', 'Event 4'],
            datasets: [{
                label: 'Event Participants',
                data: [20, 30, 40, 25],
                fill: false,
                borderColor: '#007bff',
                tension: 0.1
            }]
        }
    });
</script>
<style>

    .btn {
        background-color: #D4B59B;
        border-color: #D4B59B;
        color: #ffffff;
        font-size: 1.2rem;
        padding: 12px 24px;
        border-radius: 8px;
        transition: all 0.3s ease;
    }


    .btn:hover {
        background-color: #3498db;
        border-color: #3498db;
        color: white;
    }


    .btn:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.5);
    }
    canvas {
        max-height: 300px;
        width: 100%;
    }

</style>
</body>

@include('dashboard.layouts.footer')

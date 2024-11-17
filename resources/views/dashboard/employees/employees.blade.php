@extends('dashboard.layouts.header')
@include('dashboard.layouts.header')
<body>
@include('dashboard.layouts.side')
@include('dashboard.layouts.nav')


{{--database show start--}}
@foreach($users as $user)
    @php
    @endphp
@endforeach
{{--database show end--}}

<div class="layout-page">

    <div class="content-wrapper">

        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row g-6 mb-6">
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="content-left">
                                    <span class="text-heading">Managers</span>
                                    <div class="d-flex align-items-center my-1">
                                        <h4 class="mb-0 me-2">{{ $managerCount }}</h4>
                                    </div>
                                    <small class="mb-0">Total Managers</small>
                                </div>
                                <div class="avatar">
                            <span class="avatar-initial rounded bg-label-primary">
                                <i class="bx bx-group bx-lg"></i>
                            </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="content-left">
                                    <span class="text-heading">Admins</span>
                                    <div class="d-flex align-items-center my-1">
                                        <h4 class="mb-0 me-2">{{ $adminCount }}</h4>
                                        <p class="text-success mb-0">(+18%)</p>
                                    </div>
                                    <small class="mb-0">Total Admins</small>
                                </div>
                                <div class="avatar">
                            <span class="avatar-initial rounded bg-label-primary">
                                <i class="bx bx-user-plus bx-lg"></i>
                            </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="content-left">
                                    <span class="text-heading">Employees</span>
                                    <div class="d-flex align-items-center my-1">
                                        <h4 class="mb-0 me-2">{{ $employeeCount }}</h4>
                                        <p class="text-danger mb-0">(-14%)</p>
                                    </div>
                                    <small class="mb-0">Total Employees</small>
                                </div>
                                <div class="avatar">
                            <span class="avatar-initial rounded bg-label-primary">
                                <i class="bx bx-user-check bx-lg"></i>
                            </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div class="content-left">
                                    <span class="text-heading">Total Staff</span>
                                    <div class="d-flex align-items-center my-1">
                                        <h4 class="mb-0 me-2">{{ $user->id }}</h4>
                                        <p class="text-success mb-0">(+42%)</p>
                                    </div>
                                    <small class="mb-0">Total Staff of the year {{ date('Y') }}</small>
                                </div>
                                <div class="avatar">
                            <span class="avatar-initial rounded bg-label-primary">
                                <i class="bx bx-user-voice bx-lg"></i>
                            </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Users List Table -->
            <div class="container bg-card">
                <div class=" bg-card d-flex justify-content-between align-items-center">
                    <h3>Employees</h3>
                    <button type="button" class="btn btn-primary">Add Employee</button>
                </div>

                <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Department</th>
                    <th>Country</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }} </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->department->name }}</td>
                        <td>{{ $user->work_location }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a href="{{ route('users.profile', $user->id) }}" class="btn btn-info">View Profile</a>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>

                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>

            <!-- Pagination Links -->
            <div class="d-flex justify-content-center mt-3">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        {{-- Previous Page Link --}}
                        <li class="page-item {{ $users->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $users->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>

                        {{-- Pagination Elements --}}
                        @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                            <li class="page-item {{ $page == $users->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        {{-- Next Page Link --}}
                        <li class="page-item {{ $users->hasMorePages() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $users->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>


            <!-- / Content -->


        <!-- Footer -->
        <footer class="content-footer footer bg-cards text-dark">
            <div class="container-xxl">
                <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                    <div class="text-body">
                        © <script>
                            document.write(new Date().getFullYear())

                        </script> - 2024, made with ❤️ by <a href="https://www.linkedin.com/in/ala-ayyalslman/" target="_blank" class="footer-link">Ala Ayyalslman</a>
                    </div>
                    <div class="d-none d-lg-inline-block">

                        <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                        <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                        <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/documentation/" target="_blank" class="footer-link me-4">Documentation</a>


                        <a href="https://themeselection.com/support/" target="_blank" class="footer-link d-none d-sm-inline-block">Support</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- / Footer -->


        <div class="content-backdrop fade"></div>
    </div>
</div>

</body>
@include('dashboard.layouts.core')


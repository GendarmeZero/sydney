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
            <div class="card">
                <div class="card-header border-bottom">
                    <h5 class="card-title mb-0">Search Filters</h5>
                    <div class="d-flex justify-content-between align-items-center row pt-4 gap-4 gap-md-0 g-6">
                        <div class="col-md-4">
                            <select id="UserRole" class="form-select text-capitalize">
                                <option value="">Select Role</option>
                                <option value="Admin">Admin</option>
                                <option value="Author">Author</option>
                                <option value="Editor">Editor</option>
                                <option value="Maintainer">Maintainer</option>
                                <option value="Subscriber">Subscriber</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select id="UserPlan" class="form-select text-capitalize">
                                <option value="">Select Plan</option>
                                <option value="Basic">Basic</option>
                                <option value="Company">Company</option>
                                <option value="Enterprise">Enterprise</option>
                                <option value="Team">Team</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select id="FilterTransaction" class="form-select text-capitalize">
                                <option value="">Select Status</option>
                                <option value="Pending" class="text-capitalize">Pending</option>
                                <option value="Active" class="text-capitalize">Active</option>
                                <option value="Inactive" class="text-capitalize">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card-datatable table-responsive">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="ms-n2">
                                    <div class="dataTables_length" id="DataTables_Table_0_length">
                                        <label>
                                            <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-6 mb-md-0 mt-n6 mt-md-0 gap-md-4">
                                    <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                        <label><input type="search" class="form-control" placeholder="Search User" aria-controls="DataTables_Table_0"></label>
                                    </div>
                                    <div class="dt-buttons btn-group flex-wrap">
                                        <div class="btn-group">
                                            <button class="btn buttons-collection dropdown-toggle btn-label-secondary me-4" tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog" aria-expanded="false">
                                                <span><i class="bx bx-export me-2 bx-sm"></i>Export</span>
                                            </button>
                                        </div>
                                        <button class="btn btn-secondary add-new btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser">
                                            <span><i class="bx bx-plus bx-sm me-0 me-sm-2"></i><span class="d-none d-sm-inline-block">Add New User</span></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table class="datatables-users table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 100%;">
                            <thead>
                            <tr>
                                <th class="control sorting_disabled dtr-hidden" style="display: none;"></th>
                                <th class="dt-checkboxes-cell dt-checkboxes-select-all" style="width: 18px;">
                                    <input type="checkbox" class="form-check-input">
                                </th>
                                <th style="width: 334px;">User</th>
                                <th style="width: 149px;">Role</th>
                                <th style="width: 107px;">Plan</th>
                                <th style="width: 201px;">Billing</th>
                                <th style="width: 101px;">Status</th>
                                <th style="width: 175px;">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="odd">
                                <td class="control dtr-hidden" style="display: none;"></td>
                                <td class="dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td>
                                <td>
                                    <div class="d-flex justify-content-start align-items-center user-name">
                                        <div class="avatar-wrapper">
                                            <div class="avatar avatar-sm me-4">
                                                <img src="../../assets/img/avatars/2.png" alt="Avatar" class="rounded-circle">
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="app-user-view-account.html" class="text-heading text-truncate">John Doe</a>
                                            <small class="text-muted">john.doe@gmail.com</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-label-secondary">Author</span></td>
                                <td><span class="badge bg-label-success">Basic</span></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="text-danger me-2">-$21.89</span>
                                        <small class="text-muted">Due</small>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-label-success">Active</span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" type="button" id="userActions" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="userActions">
                                            <li><a class="dropdown-item" href="#">View</a></li>
                                            <li><a class="dropdown-item" href="#">Edit</a></li>
                                            <li><a class="dropdown-item" href="#">Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <!-- Additional rows can be added here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->


        <!-- Footer -->
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
                <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                    <div class="text-body">
                        © <script>
                            document.write(new Date().getFullYear())

                        </script>2024, made with ❤️ by <a href="https://themeselection.com" target="_blank" class="footer-link">ThemeSelection</a>
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


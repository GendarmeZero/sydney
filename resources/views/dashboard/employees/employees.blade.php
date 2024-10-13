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
                        <div class="col-md-4 user_role"><select id="UserRole" class="form-select text-capitalize"><option value=""> Select Role </option><option value="Admin">Admin</option><option value="Author">Author</option><option value="Editor">Editor</option><option value="Maintainer">Maintainer</option><option value="Subscriber">Subscriber</option></select></div>
                        <div class="col-md-4 user_plan"><select id="UserPlan" class="form-select text-capitalize"><option value=""> Select Plan </option><option value="Basic">Basic</option><option value="Company">Company</option><option value="Enterprise">Enterprise</option><option value="Team">Team</option></select></div>
                        <div class="col-md-4 user_status"><select id="FilterTransaction" class="form-select text-capitalize"><option value=""> Select Status </option><option value="Pending" class="text-capitalize">Pending</option><option value="Active" class="text-capitalize">Active</option><option value="Inactive" class="text-capitalize">Inactive</option></select></div>
                    </div>
                </div>
                <div class="card-datatable table-responsive">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer"><div class="row"><div class="col-md-2"><div class="ms-n2"><div class="dataTables_length" id="DataTables_Table_0_length"><label><select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></label></div></div></div><div class="col-md-10"><div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-6 mb-md-0 mt-n6 mt-md-0 gap-md-4"><div id="DataTables_Table_0_filter" class="dataTables_filter"><label><input type="search" class="form-control" placeholder="Search User" aria-controls="DataTables_Table_0"></label></div><div class="dt-buttons btn-group flex-wrap"> <div class="btn-group"><button class="btn buttons-collection dropdown-toggle btn-label-secondary me-4" tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog" aria-expanded="false"><span><i class="bx bx-export me-2 bx-sm"></i>Export</span></button></div> <button class="btn btn-secondary add-new btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"><span><i class="bx bx-plus bx-sm me-0 me-sm-2"></i><span class="d-none d-sm-inline-block">Add New User</span></span></button> </div></div></div></div><table class="datatables-users table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1116px;">
                            <thead>
                            <tr><th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label=""></th><th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1" colspan="1" style="width: 18px;" data-col="1" aria-label=""><input type="checkbox" class="form-check-input"></th><th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 255px;" aria-label="User: activate to sort column ascending" aria-sort="descending">User</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 109px;" aria-label="Role: activate to sort column ascending">Role</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 76px;" aria-label="Plan: activate to sort column ascending">Plan</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 150px;" aria-label="Billing: activate to sort column ascending">Billing</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 71px;" aria-label="Status: activate to sort column ascending">Status</th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 131px;" aria-label="Actions">Actions</th></tr>
                            </thead><tbody><tr class="odd"><td class="control dtr-hidden" tabindex="0" style="display: none;"></td><td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1"><div class="d-flex justify-content-start align-items-center user-name"><div class="avatar-wrapper"><div class="avatar avatar-sm me-4"><img src="../../assets/img/avatars/2.png" alt="Avatar" class="rounded-circle"></div></div><div class="d-flex flex-column"><a href="app-user-view-account.html" class="text-heading text-truncate"><span class="fw-medium">Zsazsa McCleverty</span></a><small>zmcclevertye@soundcloud.com</small></div></div></td><td><span class="text-truncate d-flex align-items-center text-heading"><i class="bx bx-user text-success me-2"></i>Maintainer</span></td><td><span class="text-heading">Enterprise</span></td><td class="" style="">Auto Debit</td><td class="" style=""><span class="badge bg-label-success" text-capitalized="">Active</span></td><td class="" style=""><div class="d-flex align-items-center"><a href="javascript:;" class="btn btn-icon delete-record"><i class="bx bx-trash bx-md"></i></a><a href="app-user-view-account.html" class="btn btn-icon"><i class="bx bx-show bx-md"></i></a><a href="javascript:;" class="btn btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded bx-md"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="even"><td class="control dtr-hidden" tabindex="0" style="display: none;"></td><td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1"><div class="d-flex justify-content-start align-items-center user-name"><div class="avatar-wrapper"><div class="avatar avatar-sm me-4"><img src="../../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle"></div></div><div class="d-flex flex-column"><a href="app-user-view-account.html" class="text-heading text-truncate"><span class="fw-medium">Yoko Pottie</span></a><small>ypottiec@privacy.gov.au</small></div></div></td><td><span class="text-truncate d-flex align-items-center text-heading"><i class="bx bx-crown text-primary me-2"></i>Subscriber</span></td><td><span class="text-heading">Basic</span></td><td class="" style="">Auto Debit</td><td class="" style=""><span class="badge bg-label-secondary" text-capitalized="">Inactive</span></td><td class="" style=""><div class="d-flex align-items-center"><a href="javascript:;" class="btn btn-icon delete-record"><i class="bx bx-trash bx-md"></i></a><a href="app-user-view-account.html" class="btn btn-icon"><i class="bx bx-show bx-md"></i></a><a href="javascript:;" class="btn btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded bx-md"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="odd"><td class="control dtr-hidden" tabindex="0" style="display: none;"></td><td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1"><div class="d-flex justify-content-start align-items-center user-name"><div class="avatar-wrapper"><div class="avatar avatar-sm me-4"><img src="../../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle"></div></div><div class="d-flex flex-column"><a href="app-user-view-account.html" class="text-heading text-truncate"><span class="fw-medium">Wesley Burland</span></a><small>wburlandj@uiuc.edu</small></div></div></td><td><span class="text-truncate d-flex align-items-center text-heading"><i class="bx bx-pie-chart-alt text-info me-2"></i>Editor</span></td><td><span class="text-heading">Team</span></td><td class="" style="">Auto Debit</td><td class="" style=""><span class="badge bg-label-secondary" text-capitalized="">Inactive</span></td><td class="" style=""><div class="d-flex align-items-center"><a href="javascript:;" class="btn btn-icon delete-record"><i class="bx bx-trash bx-md"></i></a><a href="app-user-view-account.html" class="btn btn-icon"><i class="bx bx-show bx-md"></i></a><a href="javascript:;" class="btn btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded bx-md"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="even"><td class="control dtr-hidden" tabindex="0" style="display: none;"></td><td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1"><div class="d-flex justify-content-start align-items-center user-name"><div class="avatar-wrapper"><div class="avatar avatar-sm me-4"><span class="avatar-initial rounded-circle bg-label-info">VK</span></div></div><div class="d-flex flex-column"><a href="app-user-view-account.html" class="text-heading text-truncate"><span class="fw-medium">Vladamir Koschek</span></a><small>vkoschek17@abc.net.au</small></div></div></td><td><span class="text-truncate d-flex align-items-center text-heading"><i class="bx bx-edit text-warning me-2"></i>Author</span></td><td><span class="text-heading">Team</span></td><td class="" style="">Manual - Paypal</td><td class="" style=""><span class="badge bg-label-success" text-capitalized="">Active</span></td><td class="" style=""><div class="d-flex align-items-center"><a href="javascript:;" class="btn btn-icon delete-record"><i class="bx bx-trash bx-md"></i></a><a href="app-user-view-account.html" class="btn btn-icon"><i class="bx bx-show bx-md"></i></a><a href="javascript:;" class="btn btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded bx-md"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="odd"><td class="control dtr-hidden" tabindex="0" style="display: none;"></td><td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1"><div class="d-flex justify-content-start align-items-center user-name"><div class="avatar-wrapper"><div class="avatar avatar-sm me-4"><span class="avatar-initial rounded-circle bg-label-dark">TW</span></div></div><div class="d-flex flex-column"><a href="app-user-view-account.html" class="text-heading text-truncate"><span class="fw-medium">Tyne Widmore</span></a><small>twidmore12@bravesites.com</small></div></div></td><td><span class="text-truncate d-flex align-items-center text-heading"><i class="bx bx-crown text-primary me-2"></i>Subscriber</span></td><td><span class="text-heading">Team</span></td><td class="" style="">Manual - Cash</td><td class="" style=""><span class="badge bg-label-warning" text-capitalized="">Pending</span></td><td class="" style=""><div class="d-flex align-items-center"><a href="javascript:;" class="btn btn-icon delete-record"><i class="bx bx-trash bx-md"></i></a><a href="app-user-view-account.html" class="btn btn-icon"><i class="bx bx-show bx-md"></i></a><a href="javascript:;" class="btn btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded bx-md"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="even"><td class="control dtr-hidden" tabindex="0" style="display: none;"></td><td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1"><div class="d-flex justify-content-start align-items-center user-name"><div class="avatar-wrapper"><div class="avatar avatar-sm me-4"><span class="avatar-initial rounded-circle bg-label-warning">TB</span></div></div><div class="d-flex flex-column"><a href="app-user-view-account.html" class="text-heading text-truncate"><span class="fw-medium">Travus Bruntjen</span></a><small>tbruntjeni@sitemeter.com</small></div></div></td><td><span class="text-truncate d-flex align-items-center text-heading"><i class="bx bx-desktop text-danger me-2"></i>Admin</span></td><td><span class="text-heading">Enterprise</span></td><td class="" style="">Manual - Cash</td><td class="" style=""><span class="badge bg-label-success" text-capitalized="">Active</span></td><td class="" style=""><div class="d-flex align-items-center"><a href="javascript:;" class="btn btn-icon delete-record"><i class="bx bx-trash bx-md"></i></a><a href="app-user-view-account.html" class="btn btn-icon"><i class="bx bx-show bx-md"></i></a><a href="javascript:;" class="btn btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded bx-md"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="odd"><td class="control dtr-hidden" tabindex="0" style="display: none;"></td><td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1"><div class="d-flex justify-content-start align-items-center user-name"><div class="avatar-wrapper"><div class="avatar avatar-sm me-4"><img src="../../assets/img/avatars/1.png" alt="Avatar" class="rounded-circle"></div></div><div class="d-flex flex-column"><a href="app-user-view-account.html" class="text-heading text-truncate"><span class="fw-medium">Stu Delamaine</span></a><small>sdelamainek@who.int</small></div></div></td><td><span class="text-truncate d-flex align-items-center text-heading"><i class="bx bx-edit text-warning me-2"></i>Author</span></td><td><span class="text-heading">Basic</span></td><td class="" style="">Auto Debit</td><td class="" style=""><span class="badge bg-label-warning" text-capitalized="">Pending</span></td><td class="" style=""><div class="d-flex align-items-center"><a href="javascript:;" class="btn btn-icon delete-record"><i class="bx bx-trash bx-md"></i></a><a href="app-user-view-account.html" class="btn btn-icon"><i class="bx bx-show bx-md"></i></a><a href="javascript:;" class="btn btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded bx-md"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="even"><td class="control dtr-hidden" tabindex="0" style="display: none;"></td><td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1"><div class="d-flex justify-content-start align-items-center user-name"><div class="avatar-wrapper"><div class="avatar avatar-sm me-4"><span class="avatar-initial rounded-circle bg-label-danger">SO</span></div></div><div class="d-flex flex-column"><a href="app-user-view-account.html" class="text-heading text-truncate"><span class="fw-medium">Saunder Offner</span></a><small>soffner19@mac.com</small></div></div></td><td><span class="text-truncate d-flex align-items-center text-heading"><i class="bx bx-user text-success me-2"></i>Maintainer</span></td><td><span class="text-heading">Enterprise</span></td><td class="" style="">Auto Debit</td><td class="" style=""><span class="badge bg-label-warning" text-capitalized="">Pending</span></td><td class="" style=""><div class="d-flex align-items-center"><a href="javascript:;" class="btn btn-icon delete-record"><i class="bx bx-trash bx-md"></i></a><a href="app-user-view-account.html" class="btn btn-icon"><i class="bx bx-show bx-md"></i></a><a href="javascript:;" class="btn btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded bx-md"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="odd"><td class="control dtr-hidden" tabindex="0" style="display: none;"></td><td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1"><div class="d-flex justify-content-start align-items-center user-name"><div class="avatar-wrapper"><div class="avatar avatar-sm me-4"><span class="avatar-initial rounded-circle bg-label-danger">SM</span></div></div><div class="d-flex flex-column"><a href="app-user-view-account.html" class="text-heading text-truncate"><span class="fw-medium">Stephen MacGilfoyle</span></a><small>smacgilfoyley@bigcartel.com</small></div></div></td><td><span class="text-truncate d-flex align-items-center text-heading"><i class="bx bx-user text-success me-2"></i>Maintainer</span></td><td><span class="text-heading">Company</span></td><td class="" style="">Manual - Paypal</td><td class="" style=""><span class="badge bg-label-warning" text-capitalized="">Pending</span></td><td class="" style=""><div class="d-flex align-items-center"><a href="javascript:;" class="btn btn-icon delete-record"><i class="bx bx-trash bx-md"></i></a><a href="app-user-view-account.html" class="btn btn-icon"><i class="bx bx-show bx-md"></i></a><a href="javascript:;" class="btn btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded bx-md"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td></tr><tr class="even"><td class="control dtr-hidden" tabindex="0" style="display: none;"></td><td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td><td class="sorting_1"><div class="d-flex justify-content-start align-items-center user-name"><div class="avatar-wrapper"><div class="avatar avatar-sm me-4"><img src="../../assets/img/avatars/9.png" alt="Avatar" class="rounded-circle"></div></div><div class="d-flex flex-column"><a href="app-user-view-account.html" class="text-heading text-truncate"><span class="fw-medium">Skip Hebblethwaite</span></a><small>shebblethwaite10@arizona.edu</small></div></div></td><td><span class="text-truncate d-flex align-items-center text-heading"><i class="bx bx-desktop text-danger me-2"></i>Admin</span></td><td><span class="text-heading">Company</span></td><td class="" style="">Manual - Cash</td><td class="" style=""><span class="badge bg-label-secondary" text-capitalized="">Inactive</span></td><td class="" style=""><div class="d-flex align-items-center"><a href="javascript:;" class="btn btn-icon delete-record"><i class="bx bx-trash bx-md"></i></a><a href="app-user-view-account.html" class="btn btn-icon"><i class="bx bx-show bx-md"></i></a><a href="javascript:;" class="btn btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded bx-md"></i></a><div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:;" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div></td></tr></tbody>
                        </table><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 10 of 50 entries</div></div><div class="col-sm-12 col-md-6"><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="previous" tabindex="-1" class="page-link"><i class="bx bx-chevron-left bx-18px"></i></a></li><li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0" role="link" aria-current="page" data-dt-idx="0" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" role="link" data-dt-idx="1" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" role="link" data-dt-idx="2" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" role="link" data-dt-idx="3" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" role="link" data-dt-idx="4" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item next" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" role="link" data-dt-idx="next" tabindex="0" class="page-link"><i class="bx bx-chevron-right bx-18px"></i></a></li></ul></div></div></div><div style="width: 1%;"></div></div>
                </div>
                <!-- Offcanvas to add new user -->
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
                    <div class="offcanvas-header border-bottom">
                        <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add User</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body mx-0 flex-grow-0 p-6 h-100">
                        <form class="add-new-user pt-0 fv-plugins-bootstrap5 fv-plugins-framework" id="addNewUserForm" onsubmit="return false" novalidate="novalidate">
                            <div class="mb-6 fv-plugins-icon-container">
                                <label class="form-label" for="add-user-fullname">Full Name</label>
                                <input type="text" class="form-control" id="add-user-fullname" placeholder="John Doe" name="userFullname" aria-label="John Doe">
                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                            <div class="mb-6 fv-plugins-icon-container">
                                <label class="form-label" for="add-user-email">Email</label>
                                <input type="text" id="add-user-email" class="form-control" placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="userEmail">
                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                            <div class="mb-6">
                                <label class="form-label" for="add-user-contact">Contact</label>
                                <input type="text" id="add-user-contact" class="form-control phone-mask" placeholder="+1 (609) 988-44-11" aria-label="john.doe@example.com" name="userContact">
                            </div>
                            <div class="mb-6">
                                <label class="form-label" for="add-user-company">Company</label>
                                <input type="text" id="add-user-company" class="form-control" placeholder="Web Developer" aria-label="jdoe1" name="companyName">
                            </div>
                            <div class="mb-6">
                                <label class="form-label" for="country">Country</label>
                                <div class="position-relative"><select id="country" class="select2 form-select select2-hidden-accessible" data-select2-id="country" tabindex="-1" aria-hidden="true">
                                        <option value="" data-select2-id="2">Select</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="Canada">Canada</option>
                                        <option value="China">China</option>
                                        <option value="France">France</option>
                                        <option value="Germany">Germany</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Korea">Korea, Republic of</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Russia">Russian Federation</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                    </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="1" style="width: 337px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-country-container"><span class="select2-selection__rendered" id="select2-country-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Select Country</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
                            </div>
                            <div class="mb-6">
                                <label class="form-label" for="user-role">User Role</label>
                                <select id="user-role" class="form-select">
                                    <option value="subscriber">Subscriber</option>
                                    <option value="editor">Editor</option>
                                    <option value="maintainer">Maintainer</option>
                                    <option value="author">Author</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <div class="mb-6">
                                <label class="form-label" for="user-plan">Select Plan</label>
                                <select id="user-plan" class="form-select">
                                    <option value="basic">Basic</option>
                                    <option value="enterprise">Enterprise</option>
                                    <option value="company">Company</option>
                                    <option value="team">Team</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary me-3 data-submit">Submit</button>
                            <button type="reset" class="btn btn-label-danger" data-bs-dismiss="offcanvas">Cancel</button>
                            <input type="hidden"></form>
                    </div>
                </div>
            </div>        </div>

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


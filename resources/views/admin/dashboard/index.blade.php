@extends('admin.layouts.master')

@section('title', 'Dashboard')


@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="card my-2">
            <div class="card-body d-flex align-items-center justify-content-between">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8"></div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="card-title mb-0">Top Khách hàng trong tháng</h5>
                            <div class="dropdown mx-0">
                                <a href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-dots-horizontal text-muted fs-20"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Last 28 Days</a>
                                    <a class="dropdown-item" href="#">Last Month</a>
                                    <a class="dropdown-item" href="#">Last Year</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pt-0">
                        <div class="justify-content-center">
                            <div class="table-responsive card-table">
                                <table class="table align-middle table-nowrap mb-0">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center my-1">
                                                    <div
                                                        class="avatar-sm rounded me-3 align-items-center justify-content-center d-flex">
                                                        <img src="assets/images/users/user-11.jpg"
                                                            class="img-fluid rounded-circle" alt="">
                                                    </div>
                                                    <div>
                                                        <h5 class="fs-14 mb-1">Noam Henson</h5>
                                                        <span class="text-muted">14 Verified Purchases</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="fw-normal my-1">$88K</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
@endsection

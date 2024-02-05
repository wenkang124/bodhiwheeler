@extends('admin.layouts.index')
@push('breadcrumb')
    <div class="row">
        <div class="col-md align-self-center">
            <h3 class="page-title">Dashboard</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page">
                            Dashboard
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-auto mt-3 mt-md-0 align-self-center">

        </div>
    </div>
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Daily Sales</h4>
                        <div class="text-end">
                            <h2 class="fw-light mb-0">
                                <i class="ti-arrow-up text-success"></i> $120
                            </h2>
                        </div>
                        <span class="text-success">80%</span>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 80%; height: 6px"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Weekly Sales</h4>
                        <div class="text-end">
                            <h2 class="fw-light mb-0">
                                <i class="ti-arrow-up text-info"></i> $5,000
                            </h2>
                        </div>
                        <span class="text-info">30%</span>
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 30%; height: 6px"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Monthly Sales</h4>
                        <div class="text-end">
                            <h2 class="fw-light mb-0">
                                <i class="ti-arrow-up text-purple"></i> $8,000
                            </h2>
                        </div>
                        <span class="text-purple">60%</span>
                        <div class="progress">
                            <div class="progress-bar bg-purple" role="progressbar" style="width: 60%; height: 6px"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Yearly Sales</h4>
                        <div class="text-end">
                            <h2 class="fw-light mb-0">
                                <i class="ti-arrow-down text-danger"></i> $12,000
                            </h2>
                        </div>
                        <span class="text-danger">80%</span>
                        <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 80%; height: 6px"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>

        <!-- Row -->
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-md-flex no-block">
                            <h4 class="card-title">Bookings of the Month</h4>
                            <div class="ms-auto">
                                <select class="form-select">
                                    <option selected>January</option>
                                    <option value="1">February</option>
                                    <option value="2">March</option>
                                    <option value="3">April</option>
                                </select>
                            </div>
                        </div>
                        <div class="table-responsive mt-2">
                            <table class="table stylish-table mb-0 mt-2 no-wrap v-middle">
                                <thead>
                                    <tr>
                                        <th class="fw-normal text-muted border-0 border-bottom" colspan="2">
                                            Assigned
                                        </th>
                                        <th class="fw-normal text-muted border-0 border-bottom">
                                            Name
                                        </th>
                                        <th class="fw-normal text-muted border-0 border-bottom">
                                            Status
                                        </th>
                                        <th class="fw-normal text-muted border-0 border-bottom">
                                            Total
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="width: 50px">
                                            <span
                                                class="round rounded-circle text-white d-inline-block text-center bg-info">S</span>
                                        </td>
                                        <td>
                                            <h6 class="font-weight-medium mb-0 nowrap">
                                                Sunil Joshi
                                            </h6>
                                            <small class="text-muted no-wrap">Web Designer</small>
                                        </td>
                                        <td>Elite Admin</td>
                                        <td>
                                            <span class="badge bg-light-success text-success">Low</span>
                                        </td>
                                        <td>$3.9K</td>
                                    </tr>
                                    <tr class="active">
                                        <td>
                                            <span
                                                class="round rounded-circle text-white d-inline-block text-center bg-info">A</span
                                                </td>
                                        <td>
                                            <h6 class="font-weight-medium mb-0 nowrap">
                                                Andrew
                                            </h6>
                                            <small class="text-muted no-wrap">Project Manager</small>
                                        </td>
                                        <td>Real Homes</td>
                                        <td>
                                            <span class="badge bg-light-info text-info">Submitted</span>
                                        </td>
                                        <td>$23.9K</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span
                                                class="round rounded-circle text-white d-inline-block text-center bg-success">B</span>
                                        </td>
                                        <td>
                                            <h6 class="font-weight-medium mb-0 nowrap">
                                                Bhavesh patel
                                            </h6>
                                            <small class="text-muted no-wrap">Developer</small>
                                        </td>
                                        <td>MedicalPro Theme</td>
                                        <td>
                                            <span class="badge bg-light-danger text-danger">Rejected</span>
                                        </td>
                                        <td>$12.9K</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span
                                                class="round rounded-circle text-white d-inline-block text-center bg-primary">N</span>
                                        </td>
                                        <td>
                                            <h6 class="font-weight-medium mb-0 nowrap">
                                                Nirav Joshi
                                            </h6>
                                            <small class="text-muted no-wrap">Frontend Eng</small>
                                        </td>
                                        <td>Elite Admin</td>
                                        <td>
                                            <span class="badge bg-light-success text-success">Completed</span>
                                        </td>
                                        <td>$10.9K</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span
                                                class="round rounded-circle text-white d-inline-block text-center bg-warning">M</span>
                                        </td>
                                        <td>
                                            <h6 class="font-weight-medium mb-0 nowrap">
                                                Micheal Doe
                                            </h6>
                                            <small class="text-muted no-wrap">Content Writer</small>
                                        </td>
                                        <td>Helping Hands</td>
                                        <td>
                                            <span class="badge bg-light-danger text-danger">Rejected</span>
                                        </td>
                                        <td>$12.9K</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span
                                                class="round rounded-circle text-white d-inline-block text-center bg-danger">N</span>
                                        </td>
                                        <td>
                                            <h6 class="font-weight-medium mb-0 nowrap">
                                                Johnathan
                                            </h6>
                                            <small class="text-muted no-wrap">Graphic</small>
                                        </td>
                                        <td>Digital Agency</td>
                                        <td>
                                            <span class="badge bg-light-danger text-danger">Rejected</span>
                                        </td>
                                        <td>$2.6K</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span
                                                class="round rounded-circle text-white d-inline-block text-center bg-info">M</span>
                                        </td>
                                        <td>
                                            <h6 class="font-weight-medium mb-0 nowrap">
                                                Micheal Doe
                                            </h6>
                                            <small class="text-muted no-wrap">Content Writer</small>
                                        </td>
                                        <td>Helping Hands</td>
                                        <td>
                                            <span class="badge bg-light-info text-info">Submitted</span>
                                        </td>
                                        <td>$12.9K</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row -->
    </div>
@endsection

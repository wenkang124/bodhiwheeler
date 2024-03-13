@extends('admin.layouts.index')
@push('breadcrumb')
    <div class="row">
        <div class="col-md align-self-center">
            <h3 class="page-title">Dashboard</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
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
        <div class="row justify-content-center">
            <!-- Column -->
            <div class="col-md-6 col-lg-3 col-xlg-3">
                <div class="card">
                    <div class="box p-2 rounded bg-info text-center">
                        <h1 class="fw-light text-white">${{ $salesData['daily']->total_sales ?? '0.00' }}</h1>
                        <h6 class="text-white">Daily Sales</h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-3 col-xlg-3">
                <div class="card">
                    <div class="box p-2 rounded bg-primary text-center">
                        <h1 class="fw-light text-white">${{ $salesData['weekly']->total_sales ?? '0.00' }}</h1>
                        <h6 class="text-white">Weekly Sales</h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-3 col-xlg-3">
                <div class="card">
                    <div class="box p-2 rounded bg-success text-center">
                        <h1 class="fw-light text-white">${{ $salesData['monthly']->total_sales ?? '0.00' }}</h1>
                        <h6 class="text-white">Monthly Sales</h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-3 col-xlg-3">
                <div class="card">
                    <div class="box p-2 rounded bg-warning text-center">
                        <h1 class="fw-light text-white">${{ $salesData['yearly']->total_sales ?? '0.00' }}</h1>
                        <h6 class="text-white">Yearly Sales</h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-3 col-xlg-3">
                <div class="card">
                    <div class="box p-2 rounded bg-secondary text-center">
                        <h1 class="fw-light text-white">{{ $salesData['daily']->booking_count ?? 0 }}</h1>
                        <h6 class="text-white">Daily Bookings</h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-3 col-xlg-3">
                <div class="card">
                    <div class="box p-2 rounded bg-danger text-center">
                        <h1 class="fw-light text-white">{{ $salesData['weekly']->booking_count ?? 0 }}</h1>
                        <h6 class="text-white">Weekly Bookings</h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-3 col-xlg-3">
                <div class="card">
                    <div class="box p-2 rounded bg-dark text-center">
                        <h1 class="fw-light text-white">{{ $salesData['monthly']->booking_count ?? 0 }}</h1>
                        <h6 class="text-white">Monthly Bookings</h6>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-3 col-xlg-3">
                <div class="card">
                    <div class="box p-2 rounded bg-megna text-center">
                        <h1 class="fw-light text-white">{{ $salesData['yearly']->booking_count ?? 0 }}</h1>
                        <h6 class="text-white">Yearly Bookings</h6>
                    </div>
                </div>
            </div>

        </div>

        <!-- Row -->
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-md-flex no-block">
                            <h4 class="card-title">On Going Bookings</h4>
                        </div>
                        <div class="table-responsive mt-2">
                            <table class="table stylish-table mb-0 mt-2 no-wrap v-middle">
                                <thead>
                                    <tr>
                                        <th class="fw-normal text-muted border-0 border-bottom">
                                            Name
                                        </th>
                                        <th class="fw-normal text-muted border-0 border-bottom">
                                            Contact
                                        </th>
                                        <th class="fw-normal text-muted border-0 border-bottom">
                                            Details
                                        </th>
                                        <th class="fw-normal text-muted border-0 border-bottom">
                                            Package
                                        </th>
                                        <th class="fw-normal text-muted border-0 border-bottom">
                                            Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($latestApprovedBookings as $latestApprovedBooking)
                                        <tr>
                                            <td>
                                                <h6 class="font-weight-medium mb-0 nowrap">
                                                    <a href="{{ route('admin.booking.approved-booking.detail', [$latestApprovedBooking->id]) }}" target="_blank">{{ $latestApprovedBooking->name }}</a>
                                                </h6>
                                            </td>
                                            <td>{{ $latestApprovedBooking->phone }}</td>
                                            <td>
                                                <strong>Pick-up Address:</strong> {{ $latestApprovedBooking->pick_up_address }}<br>
                                                <strong>Drop Off Address:</strong> {{ $latestApprovedBooking->drop_off_address }}<br>
                                                <strong>Pick-up Time:</strong> {{ $latestApprovedBooking->pick_up_time }}<br>
                                                <strong>Driver Name:</strong> {{ $latestApprovedBooking->driver->name }}
                                            </td>
                                            <td>{{ $latestApprovedBooking->package_name }}</td>
                                            <td><span class="badge bg-light-success text-success">{{ ucfirst($latestApprovedBooking->status) }}</span></td>
                                        </tr>
                                    @endforeach
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

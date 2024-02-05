@extends('admin.layouts.index')

@push('breadcrumb')
    <div class="row">
        <div class="col-md align-self-center">
            <h3 class="page-title">Booking</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page">
                            Approved Booking Details
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="border-bottom title-part-padding d-flex align-items-center gap-3">
                                            <h4 class="card-title mb-0">Details</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-3 col-xs-6">
                                                    <strong>Name</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $booking->name }}</p>
                                                </div>
                                                <div class="col-md-3 col-xs-6">
                                                    <strong>Contact</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $booking->phone }}</p>
                                                </div>
                                                <div class="col-md-3 col-xs-6">
                                                    <strong>Pick Up Date</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $booking->pick_up_date }}</p>
                                                </div>
                                                <div class="col-md-3 col-xs-6">
                                                    <strong>Pick Up Time</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $booking->pick_up_time }}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                @if ($booking->package_name === 'Return')
                                                    <div class="col-md-3 col-xs-6">
                                                        <strong>Return Time</strong>
                                                        <br>
                                                        <p class="text-muted">{{ $booking->return_time }}</p>
                                                    </div>
                                                @endif

                                                @if ($booking->no_of_charter_hours === 'Charter')
                                                    <div class="col-md-3 col-xs-6">
                                                        <strong>No Of Charter Hours</strong>
                                                        <br>
                                                        <p class="text-muted">{{ $booking->no_of_charter_hours }}</p>
                                                    </div>
                                                @endif
                                                <div class="col-md-3 col-xs-6">
                                                    <strong>Pick Up Address</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $booking->pick_up_address }}</p>
                                                </div>

                                                <div class="col-md-3 col-xs-6">
                                                    <strong>Drop Off Address</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $booking->drop_off_address }}</p>
                                                </div>

                                                <div class="col-md-3 col-xs-6">
                                                    <strong>No of Passengers</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $booking->no_of_passenger }}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 col-xs-6">
                                                    <strong>No of Wheelchair Pax</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $booking->no_of_wheelchair_pax }}</p>
                                                </div>
                                                <div class="col-md-3 col-xs-6">
                                                    <strong>Total Price</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $booking->total_price }}</p>
                                                </div>
                                                <div class="col-md-3 col-xs-6">
                                                    <strong>Total Distance</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $booking->distance }}</p>
                                                </div>
                                                <div class="col-md-3 col-xs-6">
                                                    <strong>Package Name</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $booking->package_name }}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 col-xs-6">
                                                    <strong>Remarks</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $booking->remarks ?? '-' }}</p>
                                                </div>
                                                <div class="col-md-3 col-xs-6">
                                                    <strong>Approved By</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $booking->approvedBy->name }}</p>
                                                </div>
                                                <div class="col-md-3 col-xs-6">
                                                    <strong>Approved Date</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $booking->approved_at }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

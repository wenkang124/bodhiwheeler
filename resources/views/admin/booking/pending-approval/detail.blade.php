@extends('admin.layouts.index')

@push('breadcrumb')
    <div class="row">
        <div class="col-md align-self-center">
            <h3 class="page-title">Booking</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.booking.pending-approval')}}">Pending Approval</a>
                        </li>
                        <li class="breadcrumb-item">
                            {{$booking->id}}
                        </li>
                        <li class="breadcrumb-item">
                            Details
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
                                        <div class="border-bottom title-part-padding d-flex align-items-center justify-content-between">
                                            <h4 class="card-title mb-0">Details</h4>
                                            <div class="col-auto mt-3 mt-md-0 align-self-center">
                                                <div class="d-flex">
                                                    <a href="{{ route('admin.booking.edit', ['booking' => $booking->id]) }}" class="btn btn-outline-info">Assign Driver</a>

                                                    <!-- Approve Button -->
                                                    <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal" data-bs-target="#approveModal">
                                                        <i class="mdi mdi-check-circle"></i> Approve
                                                    </button>

                                                    <!-- Reject Button -->
                                                    <button type="button" class="btn btn-danger ms-2" data-bs-toggle="modal" data-bs-target="#rejectModal">
                                                        <i class="mdi mdi-close-circle"></i> Reject
                                                    </button>

                                                    <a href="{{ route('admin.booking.pending-approval.send-mail-notification', ['booking' => $booking->id]) }}" class="btn btn-outline-warning ms-2" onclick="return confirm('Are you confirm to send mail notification?')">Send Mail Notification</a>
                                                    <a href="{{ route('admin.booking.pending-approval.download-invoice', ['booking' => $booking->id]) }}" class="btn btn-outline-primary ms-2">
                                                        Download Invoice
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-3 col-xs-6">
                                                    <strong>Name</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $booking->name }}</p>
                                                </div>
                                                <div class="col-md-3 col-xs-6">
                                                    <strong>Email</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $booking->email ?? 'N/A' }}</p>
                                                </div>
                                                <div class="col-md-3 col-xs-6">
                                                    <strong>Contact</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $booking->phone }}</p>
                                                </div>
                                                @if($booking->createdByAdmin)
                                                <div class="col-md-3 col-xs-6">
                                                    <strong>Created by Admin</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $booking->createdByAdmin->name }}</p>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="row">
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
                                                        <p class="text-muted">{{ $booking->is_estimated_return_time ? 'Customer will whatsapp once ready to return' : $booking->return_time }}</p>
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
                                                    <p class="text-muted">{{ $booking->distance }}KM</p>
                                                </div>
                                                <div class="col-md-3 col-xs-6">
                                                    <strong>Package Name</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $booking->package_name }}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 col-xs-6">
                                                    <strong>Medical Escort</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $booking->medical_escort ? 'True' : 'False' }}
                                                    </p>
                                                </div>
                                                <div class="col-md-3 col-xs-6">
                                                    <strong>Remarks</strong>
                                                    <br>
                                                    <p class="text-muted">{{ $booking->remarks ?? '-' }}</p>
                                                </div>
                                            </div>

                                            @if ($booking->payment_receipt)
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <strong>Payment Receipt</strong>
                                                        <br>
                                                        <button type="button" class="btn btn-primary view-receipt-btn" data-receipt-image="{{ $booking->payment_receipt }}">
                                                            View Receipt
                                                        </button>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="d-flex justify-content-between align-items-center mt-5">
                                <h4 class="mb-0">Booking Price Details</h4>
                                <a href="#" class="btn btn-outline-success ms-auto" data-bs-toggle="modal" data-bs-target="#adjustPriceModal">
                                    Adjust Price
                                </a>
                            </div>
                            <div class="table-responsive mt-3">
                                <table class="table table-bordered table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Type</th>
                                            <th scope="col">Cost</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($booking->bookingAdjustments as $adjustment)
                                            <tr>
                                                <td>{{ $adjustment->description }}</td>
                                                <td>${{ number_format($adjustment->adjustment, 2) }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td><strong>Total</strong></td>
                                            <td><strong>${{ number_format($booking->total_price, 2) }}</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="paymentReceiptModal" tabindex="-1" role="dialog" aria-labelledby="paymentReceiptModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered justify-content-center" role="document">
            <div class="modal-content border-0 w-auto">
                <div class="modal-body d-flex flex-column p-0">
                    <button type="button" class="btn btn-dark position-absolute end-0 m-2" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <img id="paymentReceiptImage" class="modal-image" width="400px" height="600px" alt="Payment Receipt">
                </div>
            </div>
        </div>
    </div>

    <!-- Adjust Price Modal -->
    <div class="modal fade" id="adjustPriceModal" tabindex="-1" role="dialog" aria-labelledby="adjustPriceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adjustPriceModalLabel">Adjust Booking Price</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.booking.pending-approval.adjust-price', ['booking' => $booking->id]) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        @foreach ($booking->bookingAdjustments as $adjustment)
                            <div class="mb-3">
                                <label for="adjustment_{{ $adjustment->id }}" class="form-label">{{ $adjustment->description }}</label>
                                <input type="number" step="0.01" class="form-control" id="adjustment_{{ $adjustment->id }}" name="adjustments[{{ $adjustment->id }}]" value="{{ $adjustment->adjustment }}" required>
                            </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    .booking-summary {
        background-color: #f8f9fa;
        padding: 15px;
        border-radius: 5px;
        margin-top: 15px;
    }

    .booking-summary h6 {
        color: #495057;
        margin-bottom: 10px;
        font-weight: 600;
    }

    .booking-summary p {
        margin-bottom: 5px;
        color: #6c757d;
    }

    .btn-success, .btn-danger {
        min-width: 100px;
    }

    .modal-header {
        border-bottom: 2px solid #dee2e6;
    }

    .alert {
        border: none;
        border-radius: 8px;
    }
</style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const viewReceiptBtns = document.querySelectorAll('.view-receipt-btn');
            viewReceiptBtns.forEach(function(btn) {
                btn.addEventListener('click', function() {
                    const receiptImageSrc = '/storage/' + this.getAttribute('data-receipt-image');
                    const paymentReceiptImage = document.getElementById('paymentReceiptImage');
                    paymentReceiptImage.src = receiptImageSrc;
                    const modal = new bootstrap.Modal(document.getElementById(
                        'paymentReceiptModal'));
                    modal.show();
                });
            });
        });
    </script>
@endpush

<!-- Approve Modal -->
<div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="approveModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="approveModalLabel">Approve Booking</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.booking.pending-approval.update-status', $booking) }}" method="POST">
                @csrf
                <input type="hidden" name="status" value="approved">
                <div class="modal-body">
                    <div class="alert alert-success">
                        <i class="mdi mdi-check-circle me-2"></i>
                        Are you sure you want to approve this booking?
                    </div>
                    <div class="booking-summary">
                        <h6>Booking Summary:</h6>
                        <p><strong>Customer:</strong> {{ $booking->name }}</p>
                        <p><strong>Pick-up Date:</strong> {{ $booking->pick_up_date }}</p>
                        <p><strong>Pick-up Time:</strong> {{ $booking->pick_up_time }}</p>
                        <p><strong>Total Price:</strong> ${{ number_format($booking->total_price, 2) }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">
                        <i class="mdi mdi-check-circle me-2"></i>Approve Booking
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Reject Modal -->
<div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rejectModalLabel">Reject Booking</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.booking.pending-approval.update-status', $booking) }}" method="POST">
                @csrf
                <input type="hidden" name="status" value="rejected">
                <div class="modal-body">
                    <div class="alert alert-danger">
                        <i class="mdi mdi-close-circle me-2"></i>
                        Are you sure you want to reject this booking?
                    </div>
                    <div class="booking-summary">
                        <h6>Booking Summary:</h6>
                        <p><strong>Customer:</strong> {{ $booking->name }}</p>
                        <p><strong>Pick-up Date:</strong> {{ $booking->pick_up_date }}</p>
                        <p><strong>Pick-up Time:</strong> {{ $booking->pick_up_time }}</p>
                        <p><strong>Total Price:</strong> ${{ number_format($booking->total_price, 2) }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="rejection_reason" class="form-label">Reason for Rejection (Optional)</label>
                        <textarea class="form-control" id="rejection_reason" name="rejection_reason" rows="3" placeholder="Enter reason for rejection..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">
                        <i class="mdi mdi-close-circle me-2"></i>Reject Booking
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

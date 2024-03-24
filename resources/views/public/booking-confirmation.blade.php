@extends('public.layouts.index')

@push('meta')
    <title>Booking Confirmation | Affordable Wheelchair Transport Singapore | BodhiWheeler</title>
@endpush

@section('content')
    <div class="breadcrumb booking-breadcrumb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-5">
                    <div class="part-txt">
                        <h1>Booking Confirmation</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="confirmation-detail">
                        <h2 class="text-center">Thank You for Your Booking!</h2>
                        <p class="confirmation-msg">Your booking details are confirmed as below:</p>
                        <ul class="booking-details">
                            <li><strong>Booking ID:</strong> {{ $booking->id }}</li>
                            <li><strong>Name:</strong> {{ $booking->name }}</li>
                            <li><strong>Phone Number:</strong> {{ $booking->phone }}</li>
                            <li><strong>Pick-up Date and Time:</strong> {{ $booking->pick_up_date }} at
                                {{ $booking->pick_up_time }}</li>
                            @if ($booking->return_time && !$booking->is_estimated_return_time)
                                <li><strong>Return Time:</strong> {{ $booking->return_time }}</li>
                            @elseif ($booking->is_estimated_return_time)
                                <li><strong>Estimated Return Time:</strong> {{ $booking->return_time }} (Estimated 3 hours from Pick-up Time)
                                </li>
                                <span class="text-danger m-1">(This is estimated, you can edit to change the return time)</span>
                            @endif
                            <li><strong>Pick-up Address:</strong> {{ $booking->pick_up_address }}</li>
                            <li><strong>Drop-off Address:</strong> {{ $booking->drop_off_address }}</li>
                            <li><strong>Distance:</strong> {{ $booking->distance }}KM</li>
                            <li><strong>Number of Passengers:</strong> {{ $booking->no_of_passenger }}</li>
                            <li><strong>Number of Wheelchair Pax:</strong> {{ $booking->no_of_wheelchair_pax }}</li>
                            {{-- @if ($booking->package_name === 'Return' || $booking->package_name === 'Charter')
                                <li>
                                    <h4>Medical Escort: {{ $medical_escort == 1 ? 'True' : 'False' }}</h4>
                                </li>
                            @endif --}}
                            <li><strong>Package:</strong> {{ $booking->package_name }}</li>
                            <li><strong>Total Price:</strong> ${{ $booking->total_price }}</li>
                        </ul>

                        <div class="mt-5">
                            <h4>Booking Price Details</h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Type</th>
                                        <th scope="col">Cost</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalCost = 0;
                                    @endphp
                                    @foreach ($booking->bookingAdjustments as $adjustment)
                                        @php
                                            // Calculate total cost
                                            $totalCost += $adjustment->total;
                                        @endphp
                                        <tr>
                                            <td>{{ $adjustment->description }}</td>
                                            <td>${{ $adjustment->total }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td><strong>Total</strong></td>
                                        <td><strong>${{ $totalCost }}</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="text-center">
                        @if ($systemConfig->is_active)
                            @if ($systemConfig->image_path)
                                <img src="{{ asset('/storage/' . $systemConfig->image_path) }}" alt="Payment QR Code" class="mb-4" width="200" height="200">
                            @else
                                <img src="{{ asset('assets/images/payment-qr.jpg') }}" alt="Payment QR Code" class="mb-4" width="200" height="200">
                            @endif

                            <h6>Payment is required to finalize your booking.</h6>
                            <h6>Confirm your reservation and enjoy your ride with confidence.</h6>
                        @endif

                        <!-- Form to Submit and Change Booking Status -->
                        <form id="booking-confirmation-form" action="{{ route('booking.submit-confirmation') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                            @if ($systemConfig->is_active)
                                <div class="mb-3 mt-4 text-left">
                                    <label for="formFileMd" class="form-label">Upload Receipt (Only if payment
                                        made):</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="payment_receipt" name="payment_receipt" accept="image/*"\>
                                        <label class="input-group-text" for="payment_receipt">Choose file</label>
                                    </div>
                                </div>
                            @endif
                            <a class="def-btn def-btn-3 m-3" href="{{ route('booking.edit', ['booking_id' => $booking->id]) }}" class="btn btn-primary">Edit Booking</a>
                            <button class="g-recaptcha def-btn def-btn-2" data-sitekey="{{ env('GOOGLE_RECAPTCHA_SITE_KEY') }}" data-callback='onSubmit' data-action='submit'>Confirm Booking</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('scripts')
    <script>
        function onSubmit(token) {
            if (document.getElementById("booking-confirmation-form").reportValidity()) {
                $('button.g-recaptcha').replaceWith(' <i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
                document.getElementById("booking-confirmation-form").submit();
            }
        }
    </script>
@endpush

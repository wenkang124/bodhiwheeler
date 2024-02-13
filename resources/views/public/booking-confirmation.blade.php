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
                            <li><strong>Pick-up Date and Time:</strong> {{ $booking->pick_up_date }} at {{ $booking->pick_up_time }}</li>
                            @if($booking->return_time)
                                <li><strong>Return Time:</strong> {{ $booking->return_time }}</li>
                            @endif
                            <li><strong>Pick-up Address:</strong> {{ $booking->pick_up_address }}</li>
                            <li><strong>Drop-off Address:</strong> {{ $booking->drop_off_address }}</li>
                            <li><strong>Number of Passengers:</strong> {{ $booking->no_of_passenger }}</li>
                            <li><strong>Number of Wheelchair Pax:</strong> {{ $booking->no_of_wheelchair_pax }}</li>
                            <li><strong>Package:</strong> {{ $booking->package_name }}</li>
                            <li><strong>Total Price:</strong> ${{ $booking->total_price }}</li>
                        </ul>
                        <div class="text-center">
                            <!-- Placeholder for QR Code Image -->
                            {{-- <img src="{{ asset('path/qr-code/image.png') }}" alt="Payment QR Code" class="mb-4"> --}}
                            <div style="border: 2px dashed #ccc; width: 200px; height: 200px; margin: 20px auto;"></div>

                            <h6>Payment is required to finalize your booking.</h6>
                            <h6>Confirm your reservation and enjoy your ride with confidence.</h6>

                            <!-- Form to Submit and Change Booking Status -->
                            <form id="booking-confirmation-form" action="{{route('booking.booking-confirmation')}}" method="POST">
                                @csrf
                                <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                                <button type="submit" class="g-recaptcha def-btn def-btn-2">Confirm Booking</button>
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
        if(document.getElementById("booking-confirmation-form").reportValidity()){
            $('button.g-recaptcha').replaceWith(' <i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
            document.getElementById("booking-confirmation-form").submit();
        }
    }
</script>
@endpush

@extends('public.layouts.index')
@push('meta')
    <title>Booking Success</title>
@endpush

@section('content')

    <!-- success begin -->
    <div class="error">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-7">
                    <div class="boxes">
                        <img src={{ asset('assets/images/success.png') }} alt="image">
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9">
                    <div class="part-txt">
                        <h2>Booking <span>Successful</span></h2>
                        <h4>Booking will only be confirm upon payment received</h4>
                        <p>Our administrator will contact you shortly.</p>
                        <a href="{{ route('home') }}" class="def-btn">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- success end -->
@endsection

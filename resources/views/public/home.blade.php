@extends('public.layouts.index')
@push('meta')
    <title>Affordable Wheelchair Transport Singapore | BodhiWheeler</title>
@endpush
@section('content')
    <!-- banner begin -->
    <div class="banner">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="banner-txt">
                        <h4>Accessible Wheelchair Transport</h4>
                        <h1>Secure & Reliable Journeys with <span><b>BodhiWheeler</b></span></h1>
                        <p>Enjoy worry-free wheelchair-friendly transport, your dedicated partner for accessible and
                            reliable journeys.</p>
                        <div class="btn-box">
                            <a href="{{ route('services') }}" class="left-btn">Our Services</a>
                            <a href="{{ route('contact') }}" class="right-btn">Get In Touch</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner end -->

    <!-- about begin -->
    @include('public.components.about', ['showReadMore' => true])
    <!-- about end -->

    <!-- process begin -->
    <div class="process">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-4">
                    <div class="heading">
                        <h5>HOW TO BOOK</h5>
                        <h2>Our Booking Process</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-sm-6">
                    <div class="single-box">
                        <div class="part-icon">
                            <img src="assets/images/process-icon-1.png" alt="icon">
                        </div>
                        <div class="part-txt">
                            <h3>Contact Us</h3>
                            <p>Get in touch with us through our registration form or via WhatsApp to inquire about our
                                wheelchair services.</p>
                        </div>
                        <span>01</span>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-6">
                    <div class="single-box">
                        <div class="part-icon">
                            <img src="assets/images/process-icon-2.png" alt="icon">
                        </div>
                        <div class="part-txt">
                            <h3>Discuss Requirements</h3>
                            <p>We'll discuss your specific requirements and needs for the wheelchair service.</p>
                        </div>
                        <span>02</span>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-6">
                    <div class="single-box">
                        <div class="part-icon">
                            <img src="assets/images/process-icon-3.png" alt="icon">
                        </div>
                        <div class="part-txt">
                            <h3>Schedule Pickup</h3>
                            <p>We'll work with you to schedule a convenient pickup time for the wheelchair service.</p>
                        </div>
                        <span>03</span>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-6">
                    <div class="single-box">
                        <div class="part-icon">
                            <img src="assets/images/process-icon-4.png" alt="icon">
                        </div>
                        <div class="part-txt">
                            <h3>Enjoy Your Ride</h3>
                            <p>Relax and enjoy a safe and comfortable ride with our wheelchair-friendly transport service.
                            </p>
                        </div>
                        <span>04</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- process end -->

    <!-- pricing begin -->
    @include('public.components.price-list')
    <!-- pricing end -->

    <!-- call back begin -->
    @include('public.components.call-back')
    <!-- call back end -->
@endsection

@extends('public.layouts.index')
@push('meta')
    <title>Contact Us | Affordable Wheelchair Transport Singapore | BodhiWheeler</title>
@endpush
@section('content')
    <!-- breadcrumb begin -->
    <div class="breadcrumb contact-breadcrumb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-4">
                    <div class="part-txt">
                        <h1>contact Us</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- contact begin -->
    <div class="contact">
        <div class="container">
            <div class="boxes">
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-7">
                        <div class="single-box">
                            <div class="part-icon">
                                <span><i class="flaticon-phone-call"></i></span>
                            </div>
                            <div class="part-txt">
                                <h3>Phone</h3>
                                <span>+65 93682784</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-7">
                        <div class="single-box">
                            <div class="part-icon">
                                <span><i class="flaticon-message"></i></span>
                            </div>
                            <div class="part-txt">
                                <h3>Email Us</h3>
                                <span>bodhiwheelers@gmail.com</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-7">
                        <div class="single-box">
                            <div class="part-icon">
                                <span><i class="flaticon-pin"></i></span>
                            </div>
                            <div class="part-txt">
                                <h3>Our Address</h3>
                                <span>26, Newton Road #23-09 Singapore - 307957</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact end -->

    <!-- map begin -->
    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.7663977378447!2d103.83902207567914!3d1.3157170616831357!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da19e8f43a19e7%3A0xeade7f25d0b20581!2s26%20Newton%20Rd%2C%20Singapore%20307957!5e0!3m2!1sen!2smy!4v1704606248088!5m2!1sen!2smy"
            height="600" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!-- map end -->
@endsection

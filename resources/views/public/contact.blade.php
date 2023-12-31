@extends('public.layouts.index')

@section('content')
    <!-- breadcrumb begin -->
    <div class="breadcrumb contact-breadcrumb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-4">
                    <div class="part-txt">
                        <h1>contact Us</h1>
                        <ul>
                            <li>Home</li>
                            <li>-</li>
                            <li>Contact Us</li>
                        </ul>
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
                                <span>+1 564 345-750-421</span>
                                <span>+1 564 345-750-421</span>
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
                                <span>example@example.com</span>
                                <span>sample@sample.com</span>
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
                                <span>78 Main road,Anytown,USA First Avenue, California</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form class="form">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-5 col-md-6">
                        <input type="text" placeholder="First Name*" required>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-6">
                        <input type="text" placeholder="Last Name*" required>
                    </div>
                    <div class="col-xl-10 col-lg-10">
                        <input type="email" placeholder="Email*" required>
                    </div>
                    <div class="col-xl-10 col-lg-10">
                        <input type="text" placeholder="Subject*" required>
                    </div>
                    <div class="col-xl-10 col-lg-10">
                        <textarea placeholder="Message" required></textarea>
                        <button class="def-btn def-btn-2">Send Message</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- contact end -->

    <!-- map begin -->
    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d99664.90401215477!2d-80.20190665894435!3d40.676972095096936!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sState%20Game%20Lands%20Number%20120!5e0!3m2!1sen!2sbd!4v1624868264867!5m2!1sen!2sbd"
            height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
    <!-- map end -->
@endsection

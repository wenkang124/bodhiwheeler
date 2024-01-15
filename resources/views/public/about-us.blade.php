@extends('public.layouts.index')
@push('meta')
    <title>About Us | Affordable Wheelchair Transport Singapore | BodhiWheeler</title>
@endpush
@section('content')
    <!-- breadcrumb begin -->
    <div class="breadcrumb about-breadcrumb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-3 col-lg-3">
                    <div class="part-txt">
                        <h1>About Us</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- about begin -->
    @include('public.components.about', ['showReadMore' => false])
    <!-- about end -->

    <!-- process begin -->
    @include('public.components.booking-process')
    <!-- process end -->

    <!-- choosing reason begin -->
    <div class="choosing-reason">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-6 col-lg-6 col-md-9">
                    <div class="part-txt">
                        <div class="heading text-left">
                            <h5>Why Choose Us</h5>
                            <h2>Your Premier Destination for Reliable Wheelchair Support</h2>
                        </div>
                        <p>Discover unparalleled wheelchair services in Singapore with our dedicated team. We take pride in
                            being a trusted partner, delivering reliable and high-quality assistance to individuals with
                            mobility needs. Our commitment goes beyond convenience; we strive to make every journey
                            comfortable and stress-free. Whether it's a one-way ride, long-distance transportation, or
                            medical escort service, we tailor our offerings to meet diverse requirements.
                            we ensure a seamless and enjoyable experience for every client. Choose us for your wheelchair
                            service needs, and let us redefine your expectations with our unwavering commitment to
                            excellence.
                        </p>
                        <div class="boxes">
                            <div class="single-box">
                                <div class="img">
                                    <img src="{{ asset('assets/images/choosing-reason-thumb-1.png') }}" alt="image">
                                </div>
                                <div class="txt">
                                    <h3>Easy Wheelchair On/Offboarding</h3>
                                    <p>Wheelchair passenger can get in and out of the vehicle without getting out of their
                                        wheelchair.</p>
                                </div>
                            </div>
                            <div class="single-box">
                                <div class="img">
                                    <img src="{{ asset('assets/images/choosing-reason-thumb-2.png') }}" alt="image">
                                </div>
                                <div class="txt">
                                    <h3>Relieving Caregiver Burden</h3>
                                    <p>Caregiver’s Physical and Emotional burden is greatly reduced by not needing to carry
                                        the wheelchair passenger.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-9">
                    <div class="part-img">
                        <img src="{{ asset('assets/images/choosing-reason-img.png') }}" alt="image">
                        <div class="video">
                            <a href="#" id="videoLink" data-toggle="modal" data-target="#videoModal" data-video-src="{{ asset('assets/videos/about-us.mp4') }}">
                                <i class="flaticon-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- choosing reason end -->

    <!-- Video Modal -->
    <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered"">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <iframe width="100%" height="400" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal end -->

    <!-- call back begin -->
    @include('public.components.call-back')
    <!-- call back end -->
@endsection

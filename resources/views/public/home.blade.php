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

   <!-- partner begin -->
<div class="partner">
    <div class="container">
        <div class="bg">
            <div class="brand-slider owl-carousel">
                @for ($i = 1; $i <= 8; $i++)
                    <div class="single-img" data-toggle="modal" data-target="#partnerModal" data-image-number="{{ $i }}">
                        <img src="{{ asset('assets/images/partner-' . $i . '.jpg') }}" alt="logo">
                    </div>
                @endfor
            </div>
        </div>
    </div>
</div>
<!-- partner end -->

<!-- Image Modal -->
<div class="modal fade" id="partnerModal" tabindex="-1" role="dialog" aria-labelledby="partnerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered justify-content-center">
        <div class="modal-content border-0 w-auto">
            <div class="modal-body p-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <img class="modal-image" width="400px" height="600px" alt="logo">
            </div>
        </div>
    </div>
</div>
<!-- Image Modal end -->


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
                            <img src="{{ asset('assets/images/process-icon-1.png') }}" alt="icon">
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
                            <img src="{{ asset('assets/images/process-icon-2.png') }}" alt="icon">
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
                            <img src="{{ asset('assets/images/process-icon-3.png') }}" alt="icon">
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
                            <img src="{{ asset('assets/images/process-icon-4.png') }}" alt="icon">
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

@push('scripts')
    <script>
        $('#partnerModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var imageNumber = button.data('image-number');
        var imageUrl = 'assets/images/partner-' + imageNumber + '.jpg';
        var modal = $(this);
        modal.find('.modal-image').attr('src', imageUrl);
    });
    </script>
@endpush

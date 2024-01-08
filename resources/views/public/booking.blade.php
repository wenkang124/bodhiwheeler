@extends('public.layouts.index')
@push('meta')
    <title>Booking | Affordable Wheelchair Transport Singapore | BodhiWheeler</title>
@endpush
@section('content')
    <!-- breadcrumb begin -->
    <div class="breadcrumb booking-breadcrumb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-5">
                    <div class="part-txt">
                        <h1>Booking</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- booking begin -->
    <div class="contact">
        <div class="container">
            <ul class="nav nav-tabs" id="bookingTabs" role="tablist">
                <li class="nav-item col">
                    <a class="nav-link active" id="oneWayTab" data-toggle="tab" href="#oneWayForm" role="tab"
                        aria-controls="oneWayForm" aria-selected="true">One Way</a>
                </li>
                <li class="nav-item col">
                    <a class="nav-link" id="returnTab" data-toggle="tab" href="#returnForm" role="tab"
                        aria-controls="returnForm" aria-selected="false">Return</a>
                </li>
                <li class="nav-item col">
                    <a class="nav-link" id="charterTab" data-toggle="tab" href="#charterForm" role="tab"
                        aria-controls="charterForm" aria-selected="false">Charter</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="oneWayForm" role="tabpanel" aria-labelledby="nameTab">
                    <form class="form booking-form">
                        <div class="row justify-content-center">
                            <div class="col-xl-5 col-lg-5 col-md-6">
                                <input type="text" placeholder="Name*" required>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-6">
                                <input type="text" placeholder="Mobile Number*" required>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <input type="email" placeholder="Email*" required>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-6">
                                <input type="text" placeholder="Pick Up Time*" required>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-6">
                                <input type="text" placeholder="Pick Up Date*" required>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <input type="text" placeholder="Pick Up Address" required>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <input type="text" placeholder="Drop Off Address" required>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-6">
                                <input type="text" placeholder="No of Passengers*" required>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-6">
                                <input type="text" placeholder="No of Wheelchair Pax*" required>
                            </div>
                            <div class="col-xl-10 col-lg-10 text-right">
                                <textarea placeholder="Remarks" required></textarea>
                                <button class="def-btn def-btn-2">Book Now</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="returnForm" role="tabpanel" aria-labelledby="returnTab">
                    <form class="form booking-form">
                        <div class="row justify-content-center">
                            <div class="col-xl-5 col-lg-5 col-md-6">
                                <input type="text" placeholder="Name*" required>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-6">
                                <input type="text" placeholder="Mobile Number*" required>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <input type="email" placeholder="Email*" required>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-6">
                                <input type="text" placeholder="Pick Up Time*" required>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-6">
                                <input type="text" placeholder="Return Time*" required>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <input type="text" placeholder="Pick Up Date*" required>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <input type="text" placeholder="Pick Up Address" required>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <input type="text" placeholder="Drop Off Address" required>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-6">
                                <input type="text" placeholder="No of Passengers*" required>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-6">
                                <input type="text" placeholder="No of Wheelchair Pax*" required>
                            </div>
                            <div class="col-xl-10 col-lg-10 text-right">
                                <textarea placeholder="Remarks" required></textarea>
                                <button class="def-btn def-btn-2">Book Now</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="charterForm" role="tabpanel" aria-labelledby="charterTab">
                    <form class="form booking-form">
                        <div class="row justify-content-center">
                            <div class="col-xl-5 col-lg-5 col-md-6">
                                <input type="text" placeholder="Name*" required>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-6">
                                <input type="text" placeholder="Mobile Number*" required>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <input type="email" placeholder="Email*" required>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-6">
                                <input type="text" placeholder="Pick Up Time*" required>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-6">
                                <input type="text" placeholder="No of Charter Hours*" required>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <input type="text" placeholder="Pick Up Date*" required>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <input type="text" placeholder="Pick Up Address" required>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <input type="text" placeholder="Drop Off Address" required>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-6">
                                <input type="text" placeholder="No of Passengers*" required>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-6">
                                <input type="text" placeholder="No of Wheelchair Pax*" required>
                            </div>
                            <div class="col-xl-10 col-lg-10 text-right">
                                <textarea placeholder="Remarks" required></textarea>
                                <button class="def-btn def-btn-2">Book Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- booking end -->

    <!-- process begin -->
    @include('public.components.booking-process')
    <!-- process end -->

    <!-- pricing begin -->
    @include('public.components.price-list')
    <!-- pricing end -->

    <!-- call back begin -->
    @include('public.components.call-back')
    <!-- call back end -->
@endsection
